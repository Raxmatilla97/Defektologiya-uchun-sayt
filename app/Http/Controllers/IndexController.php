<?php

namespace App\Http\Controllers;

use App\Models\News;
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
        }
   
        return view('site-pages.pages.news-and-events', compact('newsAndEvents'));
    }
}
