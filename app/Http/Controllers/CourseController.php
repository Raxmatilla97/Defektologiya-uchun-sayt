<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentCourse;

class CourseController extends Controller
{
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
            return redirect()->route('dashboard.myCreatedCourses')->with('status', 'Siz kurs yaratdingiz!');

        }else {

            return redirect()->route('dashboard.myCreatedCourses')->with('warning', "Sizda kurs yaratish uchun ruxsat yo'q, kurs yaratish uchun mutaxasis bo'lishingiz kerak!");
        }
       
    }

    public function myCreatedCourses(Request $request)
    {
        // dd(Auth::user()->specialist->id);
        if (Auth::user()->specialist) {
            $specialist_id = Auth::user()->specialist->id;
            
                
            if ($request == null) {
            
                if ($specialist_id) {
                    $myCourses = Course::where('teacher_id', $specialist_id)->orderBy('created_at', 'desc')->paginate(15);    
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
                
                    $myCourses = $query->where('teacher_id', $specialist_id)->orderBy('created_at', 'desc')->paginate(15);

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
            
            if ($maqullanganlik) {               
                $query->where('sorov_holati', $maqullanganlik);
            }
            
            
            $myCourses = $query->where('student_id', $user_id)->paginate(15);

            return view('site-pages.pages.dashboard.my-courses', compact('myCourses'));
         
        }else{

            $myCourses = null;
            return view('site-pages.pages.dashboard.my-courses', compact('myCourses'));
        }

    }


    public function editCourse($slug)
    {
        $editCourse = Course::where('slug', $slug)->first();
        
        return view('site-pages.pages.dashboard.edit-course', compact('editCourse'));
    }


    public function coursesStoreEdit(Request $request)
    {
        
       
        if (Auth::user()->specialist->id) {

            $course = Course::find($request->id);
            $course->title = $request->input('title');
            $course->narxi = $request->input('narxi');
            $course->kurs_tili = $request->input('kurs_tili');
            $course->davomiylik_vaqti = $request->input('davomiylik_vaqti');
            $course->desc = $request->input('desc');
            $course->status = $request->input('status', false); 
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('images', $filename, 'public');
                $course->image = $filePath;
            } else {
                $course->image = $request->input('image_old', $course->image);
            }
            
            if ($request->has('youtube')) {
                $videoId = '';
                parse_str(parse_url($request->input('youtube'), PHP_URL_QUERY), $params);
                if (isset($params['v'])) {
                    $videoId = $params['v'];
                } elseif (preg_match('/^\/embed\/([a-zA-Z0-9_-]+)/', parse_url($request->input('youtube'), PHP_URL_PATH), $matches)) {
                    $videoId = $matches[1];
                }
            } else {
                $videoId = 'none';
            }
            
            $course->youtube = $videoId;
            
            $course->save();
            return redirect()->route('dashboard.myCreatedCourses')->with('status', "Sizning ". $course->title ." nomli kursingiz o'zgartirildi!");

        }else {

            return redirect()->route('dashboard.createCourses')->with('warning', "Sizda kurs yaratish uchun ruxsat yo'q, kurs yaratish uchun mutaxasis bo'lishingiz kerak!");
        }
       
       
    }
}
