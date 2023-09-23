<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\specialist;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kurslarDashboardList($request = null)
    {
      
        $all_couses = Course::where('status', '1')->orderBy('created_at', 'desc')->count();
        $all_couses_maqullangan = Course::where('status', '1')->where('maqullanganligi', 'maqullandi')->orderBy('created_at', 'desc')->count();
        $all_couses_rad_etilgan = Course::where('status', '1')->where('maqullanganligi', 'rad_etildi')->orderBy('created_at', 'desc')->count();
        $all_couses_tasdiqlash_kerak = Course::where('status', '1')->where('maqullanganligi', 'korilmagan')->orderBy('created_at', 'desc')->count();

        if (isset($request)) {

            if ($request == "barcha-kurslar") {
                $all_couses_tasdiqlash_kerak_paginate = Course::where('status', '1')->orderBy('created_at', 'desc')->paginate(15);
            }if ($request == "maqullangan-kurslar") {
                $all_couses_tasdiqlash_kerak_paginate = Course::where('status', '1')->where('maqullanganligi', 'maqullandi')->orderBy('created_at', 'desc')->paginate(15);
            }if ($request == "rad-etilgan-kurslar") {
                $all_couses_tasdiqlash_kerak_paginate = Course::where('status', '1')->where('maqullanganligi', 'rad_etildi')->orderBy('created_at', 'desc')->paginate(15);
            }if ($request == "tasdiqlash-lozim-kurslar") {
                $all_couses_tasdiqlash_kerak_paginate = Course::where('status', '1')->where('maqullanganligi', 'korilmagan')->orderBy('created_at', 'desc')->paginate(15);
            }else {
                # code...
            }
                
        }else{          
            $all_couses_tasdiqlash_kerak_paginate = Course::where('status', '1')->where('maqullanganligi', 'korilmagan')->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('dashboard', compact(
            'all_couses', 
            'all_couses_maqullangan', 
            'all_couses_rad_etilgan', 
            'all_couses_tasdiqlash_kerak',
            'all_couses_tasdiqlash_kerak_paginate'
        ));
    }


    public function registerUsersList($request)
    {          
        $all_users = User::where('status', '1')->orderBy('created_at', 'desc')->get();
        $specialistCount = $all_users->pluck('specialist')->where('status', '1')->filter()->count();
        $noactiveStatus = $all_users->pluck('specialist')->where('status', '0')->count();
        $noactiveStatusAllUsers = User::where('status', '0')->count();

           
        if ($request == 'register-users') {
            $users = User::orderBy('created_at', 'desc')->paginate(15);
        }elseif ($request == 'mutaxasis-users') {
            $users = User::whereHas('specialist', function ($query) {
                $query->where('status', '1');
            })->where('status', '1')->orderBy('created_at', 'desc')->paginate(15);
        }elseif ($request == 'ban-spicalist-users') {
            $users = User::whereHas('specialist', function ($query) {
                $query->where('status', '0');
            })->where('status', '0')->orderBy('created_at', 'desc')->paginate(15);
            
        }elseif ($request == 'ban-users') {
            $users = User::where('status', '0')->orderBy('created_at', 'desc')->paginate(15);
        }
        return view('site-pages.pages.dashboard.register-users-list', compact('users', 'all_users', 'specialistCount', 'noactiveStatus', 'noactiveStatusAllUsers'));
    }

    public function kurslarSearch(Request $request)
    {
        $all_couses = Course::where('status', '1')->orderBy('created_at', 'desc')->count();
        $all_couses_maqullangan = Course::where('status', '1')->where('maqullanganligi', 'maqullandi')->orderBy('created_at', 'desc')->count();
        $all_couses_rad_etilgan = Course::where('status', '1')->where('maqullanganligi', 'rad_etildi')->orderBy('created_at', 'desc')->count();
        $all_couses_tasdiqlash_kerak = Course::where('status', '1')->where('maqullanganligi', 'korilmagan')->orderBy('created_at', 'desc')->count();

        $fish = $request->input('fish');
        $title = $request->input('title');
        $maqullanganlik = $request->input('maqullanganlik');
        
        $query = Course::query();

        if ($fish) {
            $query->whereHas('specialist', function ($query) use ($fish) {
                $query->where('fish', 'like', '%' . $fish . '%');
            });
        }
             
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }
        
        if ($maqullanganlik) {
            $query->where('maqullanganligi', 'like', '%' . $maqullanganlik . '%');
        }
      
        $all_couses_tasdiqlash_kerak_paginate = $query->paginate(10);

      
      return view('dashboard', compact(
            'all_couses', 
            'all_couses_maqullangan', 
            'all_couses_rad_etilgan', 
            'all_couses_tasdiqlash_kerak',
            'all_couses_tasdiqlash_kerak_paginate'
        ));
    }

    public function kurslarDeleteDashboard($id)
    {
      
        $application = Course::find($id);
        
        if (!$application) {
            return redirect()->back()->with('error', 'Kurs topilmadi'); // Ariza topilmadi xabarini qaytarish
        }
        
        $application->delete();
        
        return redirect()->back()->with('status', "Ro'yxatdan o'tqazilgan kurs o'chirildi!");
    }


    public function createCourses()
    {
        return view('site-pages.pages.dashboard.create-courses');
    }

    public function coursesStore(Request $request)
    {
        if (Auth::user()->specialist->id) {
                
            $validatedData = $request->validate([
                'title' => 'required|string',          
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',            
                'narxi' => 'required|string',
                'kurs_tili' => 'required|string',
                'davomiylik_vaqti' => 'required|string',          
                'desc' => 'required|string',
                'status' => 'boolean'          
            ],
            [
                'title.required' => "Kurs nomini yozishingiz kerak!",
                'image.required' => "Kurs suratini yuklashingiz kerak!",
            ]);

        
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('images', $filename, 'public');
                $validatedData['image'] = $filePath;
            }

            $slug = Str::slug($validatedData['title']) . '_' . now();

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

            $specialist_id = Auth::user()->specialist->id;            
          
            $course = new Course();
            $course->title = $validatedData['title'];
            $course->slug = $slug;
            $course->image = $validatedData['image'];
            $course->youtube = $videoId;
            $course->narxi = $validatedData['narxi'];
            $course->kurs_tili = $validatedData['kurs_tili'];
            $course->davomiylik_vaqti = $validatedData['davomiylik_vaqti'];
            $course->teacher_id = $specialist_id;
            $course->desc = $validatedData['desc'];
            $course->status = $validatedData['status'];  
        
            $course->save();
            return redirect()->route('dashboard.createCourses')->with('success', 'Course created successfully.');

        }else {

            return redirect()->route('dashboard.createCourses')->with('warning', "Sizda kurs yaratish uchun ruxsat yo'q, kurs yaratish uchun mutaxasis bo'lishingiz kerak!");
        }
       
    }

    public function myCreatedCourses(Request $request)
    {
        if (Auth::user()->specialist) {
            $specialist_id = Auth::user()->specialist->id;
            
                
            if ($request == null) {
            
                if ($specialist_id) {
                    $myCourses = Course::where('teacher_id', $specialist_id)->paginate(15);    
                    return view('site-pages.pages.dashboard.my-created-courses', compact('myCourses'));
                }

            }elseif($request){ 

                if ($specialist_id) {

                    $title = $request->input('title');
                    $maqullanganlik = $request->input('maqullanganlik');

                    $query = Course::query();
                        
                    if ($title) {
                        $query->where('title', 'like', '%' . $title . '%');
                    }
                    
                    if ($maqullanganlik) {
                        $query->where('maqullanganligi', 'like', '%' . $maqullanganlik . '%');
                    }
                
                    $myCourses = $query->where('teacher_id', $specialist_id)->paginate(15);

                    return view('site-pages.pages.dashboard.my-created-courses', compact('myCourses'));

                }else{

                    $myCourses = null;
                    return view('site-pages.pages.dashboard.my-created-courses', compact('myCourses'));
                }

            }else{

                $myCourses = null;
                return view('site-pages.pages.dashboard.my-created-courses', compact('myCourses'));
            }

        }else{

            $myCourses = 'huquq-yoq';
            return view('site-pages.pages.dashboard.my-created-courses', compact('myCourses'));
           
        }
       
       
       
    }


    public function myCourses(Request $request)
    {
        $user_id = Auth::user()->id;

        if ($request == null) {

            $myCourses = StudentCourse::where('student_id', $user_id)->get();
        
            foreach ($myCourses as $item) {
                if ($item->maqullagan->specialist->fish) {
                    $fish = $item->maqullagan->specialist->fish;
                } else {
                    $fish = "N/A"; 
                }
            
            }
            return view('site-pages.pages.dashboard.my-courses', compact('myCourses'));

        }elseif($request){                

            $title = $request->input('title');
            $maqullanganlik = $request->input('maqullanganlik');  
           
            $query = StudentCourse::query();
                
            if ($title) {
                $query->whereHas('course', function ($query) use ($title) {
                    $query->where('title', 'like', '%' . $title . '%');
                });
            }
            
            // if ($maqullanganlik) {
            //     $query->where('maqullanganligi', 'like', '%' . $maqullanganlik . '%');
            // }
            
            
            $myCourses = $query->where('student_id', $user_id)->paginate(15);

            return view('site-pages.pages.dashboard.my-courses', compact('myCourses'));
         
        }else{

            $myCourses = null;
            return view('site-pages.pages.dashboard.my-courses', compact('myCourses'));
        }

    }



    
}
