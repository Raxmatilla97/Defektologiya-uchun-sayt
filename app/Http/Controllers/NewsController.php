<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function newsAndEvents(){
        $allnewsAndEvents = News::orderBy('created_at', 'desc')->paginate(15);

        return view('site-pages.pages.dashboard.news-and-events', compact('allnewsAndEvents'));
    }

    public function newsAndEventsDelete($id)
    {
        $NewsAndEvents = News::find($id);
        
        if (!$NewsAndEvents) {
            return redirect()->back()->with('error', 'Xabarlar topilmadi'); // Ariza topilmadi xabarini qaytarish
        }
        
        $NewsAndEvents->delete();
        
        return redirect()->back()->with('status', "Yangilik yoki E'lon o'chirildi!");
    }

    public function newsAndEventsSearch(Request $request)
    {
        $title = $request->input('title');
        $status = $request->input('status');
        
        $query = News::query();
             
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }
        
        if ($status) {
            $query->where('status', '=', $status);
        }
     
        $allnewsAndEvents = $query->paginate(15);
       
      return view('site-pages.pages.dashboard.news-and-events', compact('allnewsAndEvents'));
    }

    public function newsAndEventsCreate()
    {
        return view('site-pages.pages.dashboard.add-news');
    }

    public function newsAndEventsStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',          
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'news_or_event' => 'required|string',
            'desc' => 'required|string',
            'status' => 'boolean'          
        ],
        [
            'title.required' => "Xabar nomini yozishingiz kerak!",
            'image.required' => "Xabar suratini yuklashingiz kerak!",
            'image.image' => "Xabar uchun rasm formatida fayl yuklashingiz kerak!",
            'image.mimes' => "Xabar rasmi faqat jpeg, png, jpg, gif formatlari qabul qilinadi!",
            'image.max' => "Xabar rasmi hajmi 2048KB dan oshmasligi kerak!",
            'news_or_event.required' => "Yangilik yoki E'lon bo'limini tanlashingiz kerak!",
            'desc.required' => "Xabar haqida yozishingiz kerak!",
            'status.boolean' => "Xabarni barchaga ko'rinarli yoki yo'qligini belgilang!",
        ]);

    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $filename, 'public');
            $validatedData['image'] = $filePath;
        }

        $slug = Str::slug($validatedData['title']) . '_' . now();
      
        $course = new News();
        $course->title = $validatedData['title'];
        $course->slug = $slug;
        $course->image = $validatedData['image']; 
        $course->news_or_event = $validatedData['news_or_event'];       
        $course->desc = $validatedData['desc'];
        $course->status = $validatedData['status'];         
    
        $course->save();

        return redirect()->route('dashboard.newsAndEvents')->with('status', "Siz Yangilik yoki E'lon yaratdingiz!");

 
    }

    public function newsAndEventsEdit($slug)
    {
        
        $edit_info = News::where('slug', $slug)->first();
        
        return view('site-pages.pages.dashboard.edit-news-and-event', compact('edit_info'));
    }


    public function newsAndEventsEditStore(Request $request)
    {
        
        $newsAndEvent = News::find($request->id);
        $newsAndEvent->title = $request->input('title');      
        $newsAndEvent->news_or_event = $request->input('news_or_event');  
        $newsAndEvent->desc = $request->input('desc');
        $newsAndEvent->status = $request->input('status', false); 
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $filename, 'public');
            $newsAndEvent->image = $filePath;
        } else {
            $newsAndEvent->image = $request->input('image_old', $newsAndEvent->image);
        }       
        
        
        $newsAndEvent->save();

        return redirect()->route('dashboard.newsAndEvents')->with('status', "Sizning ". $newsAndEvent->title ." nomli xabaringiz o'zgartirildi!");
 
    }

}
