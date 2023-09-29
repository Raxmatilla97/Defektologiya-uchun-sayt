<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seminarsIndex()
    {
        $allSeminars = Seminar::orderBy('created_at', 'desc')->paginate(15);
        foreach ($allSeminars as $item ) {      
            $item->boladigan_kun = Carbon::parse($item->boladigan_kun);       
        }
        return view('site-pages.pages.dashboard.seminars.index', compact('allSeminars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function seminarCreate()
    {
        return view('site-pages.pages.dashboard.seminars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function seminarStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',          
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',          
            'desc' => 'required|string',
            'boladigan_kun' => 'required|date',
            'status' => 'boolean'          
           
        ],
        [
            'title.required' => "Seminar nomini yozishingiz kerak!",
            'image.required' => "Seminar suratini yuklashingiz kerak!",
            'image.image' => "Seminar uchun rasm formatida fayl yuklashingiz kerak!",
            'image.mimes' => "Seminar rasmi faqat jpeg, png, jpg, gif formatlari qabul qilinadi!",
            'image.max' => "Seminar rasmi hajmi 2048KB dan oshmasligi kerak!",
            'desc.required' => "Seminar haqida yozishingiz kerak!",
            'status.boolean' => "Seminar barchaga ko'rinarli yoki yo'qligini belgilang!",
            'boladigan_kun.required' => "Seminar bo'ladigan vaqtni belgilang!",
            'boladigan_kun.date' => "Seminar bo'ladigan vaqtni belgilang!",
           
        ]);

    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $filename, 'public');
            $validatedData['image'] = $filePath;
        }
        $boladigan_kun = $request->input('boladigan_kun');
        // Format the timestamp to your desired format
        // $formattedTimestamp = Carbon::createFromTimestamp($boladigan_kun)->format('Y-m-d H:i');


        $slug = Str::slug($validatedData['title']) . '_' . now();
      
        $seminar = new Seminar();
        $seminar->title = $validatedData['title'];
        $seminar->slug = $slug;
        $seminar->boladigan_kun = $request->input('boladigan_kun');
        $seminar->image = $validatedData['image'];            
        $seminar->desc = $validatedData['desc'];
        $seminar->status = $validatedData['status'];         
        $seminar->tafsiya_etilgan = $request->input('tafsiya_etilgan', false);         
    
        $seminar->save();

        return redirect()->route('dashboard.seminarsIndex')->with('status', "Siz seminar yaratdingiz!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Seminar $seminar)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function seminarEdit($slug)
    {
        $edit_info = Seminar::where('slug', $slug)->first();
        
        return view('site-pages.pages.dashboard.seminars.edit', compact('edit_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function seminarUpdate(Request $request, Seminar $seminar)
    {
        $seminarUpdate = Seminar::find($request->id);
        $seminarUpdate->title = $request->input('title'); 
        $seminarUpdate->desc = $request->input('desc');
        $seminarUpdate->status = $request->input('status', false); 
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $filename, 'public');
            $seminarUpdate->image = $filePath;
        } else {
            $seminarUpdate->image = $request->input('image_old', $seminarUpdate->image);
        }       
        
        
        $seminarUpdate->save();

        return redirect()->route('dashboard.seminarsIndex')->with('status', "Sizning ". $seminarUpdate->title ." nomli seminaringiz o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function seminarDestroy(Request $request)
    {
         
        if ($request->seminar_id) {    
            $id = $request->seminar_id;
            $seminarDelete = Seminar::find($id);
            
            if (!$seminarDelete) {
                return redirect()->back()->with('error', 'Seminar topilmadi'); // Ariza topilmadi xabarini qaytarish
            }
            
            $seminarDelete->delete();
            
            return redirect()->back()->with('status', "Seminar o'chirildi!");
        }
    }

    public function seminarSearch(Request $request)
    {
        $title = $request->input('title');
      
        
        $query = Seminar::query();
             
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }
      
        $allSeminars = $query->paginate(15);
        foreach ($allSeminars as $item ) {      
            $item->boladigan_kun = Carbon::parse($item->boladigan_kun);       
        }

      return view('site-pages.pages.dashboard.seminars.index', compact('allSeminars'));   
    }
}
