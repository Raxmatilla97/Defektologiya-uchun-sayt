<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index()
    {
      
        $newsAndEvents = News::take(3)->get();
        return view('layouts.def', compact('newsAndEvents'));
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
}
