<?php

namespace App\Http\Controllers;

use App\Models\VideoDarslar;
use Illuminate\Http\Request;
use App\Models\Course;

class VideoDarslarController extends Controller
{
    public function addVideoDarslar($slug)
    {
        $editCourse = Course::where('slug', $slug)->first();

        $videoDarslar = $editCourse->videolar()->orderBy('created_at', 'asc')->get();
        
        return view('site-pages.pages.dashboard.add-video-darslar', compact('videoDarslar', 'editCourse'));

    }

    public function addVideoDarslarStore(Request $request)
    {
        if ($request->input('status') === null) {
            $request->merge(['status' => false]);
        }

      
        $validatedData = $request->validate([
            'title' => 'required|string',          
            'youtube' => 'required|string', 
            'desc' => 'required|string',
            'status' => 'boolean'          
        ],
        [
            'title.required' => "Kurs nomini yozishingiz kerak!",
            'image.required' => "Kurs suratini yuklashingiz kerak!",
        ]);    
      

        if ($request->youtube) {           
            $videoId = '';
            parse_str(parse_url($request->youtube, PHP_URL_QUERY), $params);
            if (isset($params['v'])) {
                $videoId = $params['v'];
            } elseif (preg_match('/^\/embed\/([a-zA-Z0-9_-]+)/', parse_url($request->youtube, PHP_URL_PATH), $matches)) {
                $videoId = $matches[1];
            }
        }else{
            $videoId = 'none';
        }                  
      
        $videoDars = new VideoDarslar();
        $videoDars->title = $validatedData['title'];        
        $videoDars->youtube = $videoId;      
        $videoDars->kurs_id = $request->kurs_id;
        $videoDars->desc = $validatedData['desc'];
        $videoDars->status = $validatedData['status']; 
        
    
        $videoDars->save();
        
        return redirect()->back()->with('success', "Video darsingiz qo'shildi!");
    }


    public function editVideoDarslar(Request $request)
    {
        if ($request->input('status') === null) {
            $request->merge(['status' => false]);
        }

      
        $validatedData = $request->validate([
            'title' => 'required|string',          
            'youtube' => 'required|string', 
            'desc' => 'required|string',
            'status' => 'boolean'          
        ],
        [
            'title.required' => "Kurs nomini yozishingiz kerak!",
            'image.required' => "Kurs suratini yuklashingiz kerak!",
        ]);    
      

        if ($request->youtube) {           
            $videoId = '';
            parse_str(parse_url($request->youtube, PHP_URL_QUERY), $params);
            if (isset($params['v'])) {
                $videoId = $params['v'];
            } elseif (preg_match('/^\/embed\/([a-zA-Z0-9_-]+)/', parse_url($request->youtube, PHP_URL_PATH), $matches)) {
                $videoId = $matches[1];
            }
        }else{
            $videoId = 'none';
        }                  
      
        $videoDars = VideoDarslar::find($request->video_id);
        $videoDars->title = $validatedData['title'];        
        $videoDars->youtube = $videoId;
        $videoDars->desc = $validatedData['desc'];
        $videoDars->status = $validatedData['status']; 
        
    
        $videoDars->save();
        
        return redirect()->back()->with('success', "Video darsingiz o'zgartirildi!");
    }

}
