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

        $info = $request->input('method_info');
        if($info == 'create' || $info == 'edit'){
            return redirect()->route('dashboard.registerUsersList', 'mutaxasis-users')->with('status', "Siz Mutaxassis yaratdingiz!");
        }else{
            return redirect()->back()->with('status', "Siz Mutaxasis yaratdingiz!");
        }
    }

  
    public function specialistEdit($id)
    {
        $user = User::where('status', '1')->where('roll', 'teacher')->get();
        $old_data = Specialist::where('id', $id)->first();
        
        $hwo = "spec";        
        return view('site-pages.pages.dashboard.specialists.edit', compact('user', 'old_data', 'hwo'));
    }

    public function specialistUpdate(Request $request)
    {
        $specialist = Specialist::find($request->specialist_id);
      
        if ($specialist) {
            $specialist->fish = $request->input('fish');        
            $specialist->desc = $request->input('desc');  
            $specialist->lavozim = $request->input('lavozim');
            $specialist->email = $request->input('email');
            $specialist->phone =  $request->input('phone');
            $specialist->tg_follow = $request->input('tg_follow');
            $specialist->insta_follow = $request->input('insta_follow');
            $specialist->facebook_follow = $request->input('facebook_follow');             
            $specialist->image = $request->input('image'); 
            $specialist->status = $request->input('status', false); 
            $specialist->lvl = $request->input('lvl', false); 
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('images', $filename, 'public');
                $specialist->image = $filePath;
            } else {
                $specialist->image = $request->input('image_old', $specialist->image);
            }       
            
            
            $specialist->save();

            return redirect()->route('dashboard.registerUsersList', 'register-users')->with('status', "Muvaffaqiyatli! ". $specialist->fish ." nomli mutaxasis o'zgartirildi!");
        }
    }

    public function userEdit($id)
    {
        $user = User::where('status', '1')->where('roll', 'teacher')->get();
        $old_data = User::where('id', $id)->first();
        $hwo = "user";

        return view('site-pages.pages.dashboard.specialists.edit', compact('user', 'old_data', 'hwo'));
    }


    public function specialistSearch(Request $request)
    {

        $all_users = User::where('status', '1')->orderBy('created_at', 'desc')->get();
        $specialistCount = $all_users->pluck('specialist')->where('status', '1')->count();
        
        $noactiveStatus = $all_users->pluck('specialist')->where('status', '0')->count();
        $noactiveStatusAllUsers = User::where('status', '0')->count();

        
        $user_name = $request->input('user_name');
        $specialist_name = $request->input('specialist_name');
        $filter = $request->input('filter');
        
        $query = User::query();

        if ($user_name) {
            $query->where('name', 'like', '%' . $user_name . '%');
        }
            
        if ($specialist_name) {
            $query->whereHas('specialist', function ($query) use ($specialist_name) {
                $query->where('fish', 'like', '%' . $specialist_name . '%');
            });
        }       
     
    
        $users = $query->paginate(15);

    
        return view('site-pages.pages.dashboard.register-users-list', compact('users', 'all_users', 'specialistCount', 'noactiveStatus', 'noactiveStatusAllUsers'));

    }

   
}
