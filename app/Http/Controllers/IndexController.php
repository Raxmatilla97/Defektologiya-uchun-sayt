<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Project;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
      
        $newsAndEvents = News::take(3)->get();

        $allSeminars = Seminar::where('status', '1')->orderBy('created_at', 'desc')->take('4')->get();
        foreach ($allSeminars as $item ) {      
            $item->boladigan_kun = Carbon::parse($item->boladigan_kun);       
        }

        return view('layouts.def', compact('newsAndEvents', 'allSeminars'));
    }

    public function newsAndEvents()
    {
       
        $newsAndEvents = News::where('status', '1')->paginate(9);
        return view('site-pages.pages.news-and-events', compact('newsAndEvents'));
    }

    public function newsAndEventsSort($request)
    {
        $sorting = $request;      

        if ($sorting == 'latest') {
            $newsAndEvents = News::where('status', '1')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($sorting == 'most_read') {
            $newsAndEvents = News::where('status', '1')->orderBy('title', 'desc')->paginate(9);
        } elseif ($sorting == 'oldest') {
            $newsAndEvents = News::where('status', '1')->orderBy('created_at', 'asc')->paginate(9);
        }elseif ($sorting == 'only_news') {
            $newsAndEvents = News::where('status', '1')->where('news_or_event', 'news')->orderBy('created_at', 'desc')->paginate(9);
        }elseif ($sorting == 'only_event') {
            $newsAndEvents = News::where('status', '1')->where('news_or_event', 'event')->orderBy('created_at', 'desc')->paginate(9);
        }
   
        return view('site-pages.pages.news-and-events', compact('newsAndEvents'));
    }

    public function newsAndEventsSingle($request)
    {
        $slug = $request;
        $newsEvent = News::where('status', '1')->where('slug', $slug)->first();
        
        if ($newsEvent !== null) {
            $keywords = explode(' ', $newsEvent->title); // Maqola sarlavhasini so'zlarga bo'lib ajratamiz

            $oxshashXabarlar = News::where('status', '1')
                ->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('title', 'LIKE', '%' . $keyword . '%');
                    }
                })
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();
            return view('site-pages.pages.news-and-events-singl-page', compact('newsEvent', 'oxshashXabarlar'));
        } else {         
            // Bunday slug bilan record topilmaganligi haqida xabar berish
            $notFound = "Bunday yangilik yoki e'lon topilmadi!";
            return view('site-pages.pages.news-and-events-singl-page', compact('notFound'));
        }
    }

    public function projectsIndex()
    {
        $projectsIndex = Project::where('status', '1')->orderBy('created_at', 'desc')->paginate(9);
        return view('site-pages.pages.projects-index', compact('projectsIndex'));
    }

    public function projectInfoPage($request)
    {
        $projectsIndex = Project::where('status', '1')->where('slug', $request)->first();
      
        if ($projectsIndex !== null) {
            $previousProject = Project::where('status', '1')->where('id', '<', $projectsIndex->id)->orderBy('id', 'desc')->first();
            $nextProject = Project::where('status', '1')->where('id', '>', $projectsIndex->id)->orderBy('id', 'asc')->first();
           
            $keywords = explode(' ', $projectsIndex->title); // Maqola sarlavhasini so'zlarga bo'lib ajratamiz

            $oxshashProjectlar = Project::where('status', '1')
                ->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('title', 'LIKE', '%' . $keyword . '%');
                    }
                })
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();

            return view('site-pages.pages.project-page', compact('projectsIndex', 'oxshashProjectlar', 'previousProject', 'nextProject'));
        }else{
            // Bunday slug bilan record topilmaganligi haqida xabar berish
            $notFound = "Bunday nomdagi proyekt topilmadi!";
            return view('site-pages.pages.project-page', compact('notFound'));
        }
      
    }

    public function seminarIndex()
    {
        $allSeminar = Seminar::where('status', '1')->orderBy('created_at', 'desc')->paginate(15);
        foreach ($allSeminar as $item ) {      
            $item->boladigan_kun = Carbon::parse($item->boladigan_kun);       
        }    
       $tafsiya_etilgan = Seminar::where('status', '1')->where('tafsiya_etilgan', '1')->orderBy('created_at', 'desc')->paginate(10);       

       return view('site-pages.pages.seminars-list', compact('allSeminar', 'tafsiya_etilgan'));  
    }

    public function seminarSingle($request)
    {
        $seminarIndex = Seminar::where('status', '1')->where('slug', $request)->first();
      
        if ($seminarIndex !== null) {

            $keywords = explode(' ', $seminarIndex->title); // Maqola sarlavhasini so'zlarga bo'lib ajratamiz

            $oxshashSeminarlar = Seminar::where('status', '1')
                ->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('title', 'LIKE', '%' . $keyword . '%');
                    }
                })
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();    

            $seminarIndex->boladigan_kun = Carbon::parse($seminarIndex->boladigan_kun);
            $seminarBoladiganKun = $seminarIndex->boladigan_kun->format('M j, Y H:i:s');
               
            return view('site-pages.pages.seminar-single', compact('seminarIndex', 'oxshashSeminarlar', 'seminarBoladiganKun'));
        }else{
            // Bunday slug bilan record topilmaganligi haqida xabar berish
            $notFound = "Bunday nomdagi Seminar topilmadi!";
            return view('site-pages.pages.seminar-single', compact('notFound'));
        }
    }

    public function seminarSearch(Request $request)
    {
        $text = $request->input('text');
        
        $allSeminar = Seminar::query();

        if ($text) {
            $allSeminar->where('title', 'like', '%' . $text . '%');
        }

        $allSeminar = $allSeminar->paginate(9);

        foreach ($allSeminar as $item) {
            $item->boladigan_kun = Carbon::parse($item->boladigan_kun);
        }

        $tafsiya_etilgan = Seminar::where('status', '1')->where('tafsiya_etilgan', '1')->orderBy('created_at', 'desc')->paginate(10);       

        return view('site-pages.pages.seminars-list', compact('allSeminar', 'tafsiya_etilgan'));  
    }
}
