<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function specialistsIndex()
    {
        $allSpecialists = Specialist::orderBy('created_at', 'desc')->paginate(15);

        return view('site-pages.pages.dashboard.specialists.index', compact('allSpecialists'));
    }

    /**
     * Show the form for creating a new resource.
     */

     
    public function specialistCreate()
    {
        $specialists = User::where('status', '1')->where('roll', 'teacher')->get();
       
        return view('site-pages.pages.dashboard.specialists.create', compact('specialists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function specialistStore(Request $request)
    {
     
        $validatedData = $request->validate([
            'fish' => 'required|string',          
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',          
            'user_id' => 'required',
            
        ],
        [
            'fish.required' => "Mutaxasis nomini yozishingiz kerak!",
            'image.required' => "Mutaxasis suratini yuklashingiz kerak!",
            'image.image' => "Mutaxasis uchun rasm formatida fayl yuklashingiz kerak!",
            'image.mimes' => "Mutaxasis rasmi faqat jpeg, png, jpg, gif formatlari qabul qilinadi!",
            'image.max' => "Mutaxasis rasmi hajmi 2048KB dan oshmasligi kerak!",
            'user_id.required' => "Mutaxasis foydalanuvchini belgilang!",
            
        ]);

    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $filename, 'public');
            $validatedData['image'] = $filePath;
        }

        $status = $request->input('status') ?? '0';
        
        $lvl = $request->input('lvl') ?? '0';
       
        $slug = Str::slug($validatedData['fish']) . '_' . now();
      
        $specialist = new Specialist();
        $specialist->fish = $validatedData['fish'];
        $specialist->slug = $slug;
        $specialist->desc = $request->input('desc');  
        $specialist->lavozim = $request->input('lavozim');
        $specialist->email = $request->input('email');
        $specialist->phone =  $request->input('phone');
        $specialist->tg_follow = $request->input('tg_follow');
        $specialist->insta_follow = $request->input('insta_follow');
        $specialist->facebook_follow = $request->input('facebook_follow');
        $specialist->user_id = $request->input('user_id');       
        $specialist->image = $validatedData['image'];
        $specialist->status = $status;
        $specialist->lvl = $lvl;
    
        $specialist->save();

        return redirect()->route('dashboard.registerUsersList', "mutaxasis-users")->with('status', "Siz Mutaxasis yaratdingiz!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialist $specialist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialist $specialist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialist $specialist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialist $specialist)
    {
        //
    }
}
