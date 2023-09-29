<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentCourse;

class CourseController extends Controller
{
    public function kurslarSearch(Request $request)
    {
        if (Auth::user()->specialist && Auth::user()->specialist->status == '1') {
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

        }else {

            $result = $this->huquqYoq(); // huquqYoq() funksiyasini chaqirish
            return view('site-pages.pages.dashboard.my-created-courses', $result);
        }
    }

    public function kurslarDeleteDashboard(Request $request)
    {
        
        if ($request->input('course_id')) {    
            $id = $request->course_id;
            $application = Course::find($id);
            
            if (!$application) {
                return redirect()->back()->with('error', 'Kurs topilmadi'); // Ariza topilmadi xabarini qaytarish
            }
            
            $application->delete();
            
            return redirect()->back()->with('status', "Ro'yxatdan o'tqazilgan kurs o'chirildi!");
        }
    }


    public function createCourses()
    {
        if (Auth::user()->specialist && Auth::user()->specialist->status == '1') {
            return view('site-pages.pages.dashboard.create-courses');
        }else {

            $result = $this->huquqYoq(); // huquqYoq() funksiyasini chaqirish
            return view('site-pages.pages.dashboard.my-created-courses', $result);
        }
    }

    public function coursesStore(Request $request)
    {
        if (Auth::user()->specialist && Auth::user()->specialist->status == '1') {
                
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

            $result = $this->huquqYoq(); // huquqYoq() funksiyasini chaqirish
            return view('site-pages.pages.dashboard.my-created-courses', $result);
        }
       
    }

    public function myCreatedCourses(Request $request)
    {
      
        if (Auth::user()->specialist && Auth::user()->specialist->status == '1') {
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

                    $result = $this->huquqYoq(); // huquqYoq() funksiyasini chaqirish
            return view('site-pages.pages.dashboard.my-created-courses', $result);
                }

            }else{

                $result = $this->huquqYoq(); // huquqYoq() funksiyasini chaqirish
                return view('site-pages.pages.dashboard.my-created-courses', $result);
            }

        }else{

            $result = $this->huquqYoq(); // huquqYoq() funksiyasini chaqirish
            return view('site-pages.pages.dashboard.my-created-courses', $result);
           
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

            $result = $this->huquqYoq(); // huquqYoq() funksiyasini chaqirish
            return view('site-pages.pages.dashboard.my-created-courses', $result);
        }

    }


    public function editCourse($slug)
    {
        $editCourse = Course::where('slug', $slug)->first();
        
        return view('site-pages.pages.dashboard.edit-course', compact('editCourse'));
    }


    public function coursesStoreEdit(Request $request)
    {
        if (Auth::user()->specialist && Auth::user()->specialist->status == '1') {
            $maqullagan_id = Auth::user()->id;
            $course = Course::find($request->id);
            $course->title = $request->input('title');
            $course->narxi = $request->input('narxi');
            $course->kurs_tili = $request->input('kurs_tili');
            $course->davomiylik_vaqti = $request->input('davomiylik_vaqti');
            $course->desc = $request->input('desc');
            $course->status = $request->input('status', false); 
            $course->maqullanganligi = $request->input('maqullanganligi');
            $course->maqullagan_id = $maqullagan_id;
            
            
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
            return redirect()->back()->with('status', "Sizning ". $course->title ." nomli kursingiz o'zgartirildi!");

        }else {

           
            $result = $this->huquqYoq(); // huquqYoq() funksiyasini chaqirish
            return view('site-pages.pages.dashboard.my-created-courses', $result);
        }
       
       
    }

    public function huquqYoq()
    {
        $specialists = Auth::user();       
        $myCourses = 'huquq-yoq';
    
        return compact('specialists', 'myCourses');
    }

    public function requestCourse(Request $request)
    {
        $kurs_id = $request->input('kurs_id');
        $student_id = Auth::user()->id;
        $sorov_holati = 'tekshirilmoqda';

        $tekshirish = StudentCourse::where('course_id', $kurs_id)->where('student_id', $student_id)->first();

        if ($tekshirish) {
            return redirect()->route('dashboard.myCourses')->with('status', "Siz kursga allaqachon yozilgansiz!");
        } else {
            $sorov = new StudentCourse();
            $sorov->course_id = $kurs_id;
            $sorov->student_id = $student_id;
            $sorov->sorov_holati = $sorov_holati;
            
            $sorov->save();
        }

        return redirect()->route('dashboard.myCourses')->with('status', "Siz malaka oshirish kursidagi video darslarni ko'rish uchun ariza yubordingiz! Iltimos javobini kuting, biz siz bilan bog'lanishimiz mumkin.");
    }

    public function requestCourseEdit($request)
    {
        $sorov = StudentCourse::find($request);

        if ($sorov) {
            return view('site-pages.pages.dashboard.request-course-edit', compact('sorov'));
        }
        return view('site-pages.pages.dashboard.request-course-edit')->with('status', "Bunday so'rov topilmadi!");
    }


    public function requestCourseStore(Request $request)
    {       
  
        $sorov = StudentCourse::find($request->request_id);
    
        if ($sorov) {
            $sorov->course_id = $request->input('course_id');        
            $sorov->student_id = $request->input('student_id');
            $sorov->sorov_holati = $request->input('sorov_holati');
            $sorov->tolov_qilgani = $request->input('tolov_qilgani');           
            $sorov->bu_xaqda_xabar = $request->input('bu_xaqda_xabar');
            
            $sorov->save();
        
            return redirect()->route('dashboard.courseRequestViews')->with('status', 'Siz arizani tahrirladingiz!');
        } else {
            // Handle the case when the $sorov object is not found
            // You can redirect or show an error message
        }
    }

    
    public function courseRequestViews()
    {
        $CourseRequest = StudentCourse::paginate(15);

        return view('site-pages.pages.dashboard.courses-request-views', compact('CourseRequest'));
    }


    public function myCoursesRequestSearch(Request $request)
    {
        
        $title = $request->input('title');
        $maqullanganlik = $request->input('maqullanganlik');  
       
        $query = StudentCourse::query();
            
        if ($title) {
            $query->whereHas('course', function ($query) use ($title) {
                $query->where('title', 'like', '%' . $title . '%');
            });
        }

        if (in_array($request->input('maqullanganlik'), ['maqullandi', 'ruxsat_berilmadi', 'tekshirilmoqda'])) {
            if ($maqullanganlik) {               
                $query->where('sorov_holati', $maqullanganlik);
            }
        } else {
            if ($maqullanganlik) {               
                $query->where('tolov_qilgani', $maqullanganlik);
            }
        }   

        $user_id = Auth::user()->id;
        $myCourses = $query->where('student_id', $user_id)->paginate(15);

        return view('site-pages.pages.dashboard.my-courses', compact('myCourses'));
     
    }


    public function allCoursesRequestSearch(Request $request)
    {
        
        $title = $request->input('title');
        $maqullanganlik = $request->input('maqullanganlik');  
       
        $query = StudentCourse::query();
            
        if ($title) {
            $query->whereHas('course', function ($query) use ($title) {
                $query->where('title', 'like', '%' . $title . '%');
            });
        }

        if (in_array($request->input('maqullanganlik'), ['maqullandi', 'ruxsat_berilmadi', 'tekshirilmoqda'])) {
            if ($maqullanganlik) {               
                $query->where('sorov_holati', $maqullanganlik);
            }
        } else {
            if ($maqullanganlik) {               
                $query->where('tolov_qilgani', $maqullanganlik);
            }
        }           
      
        $CourseRequest = $query->paginate(15);

        return view('site-pages.pages.dashboard.courses-request-views', compact('CourseRequest'));
     
    }


    
    public function allCoursesRequestDelete($id)
    {
      
        $request = StudentCourse::find($id);
        
        if (!$request) {
            return redirect()->back()->with('error', 'Ariza topilmadi'); // Ariza topilmadi xabarini qaytarish
        }
        
        $request->delete();
        
        return redirect()->back()->with('status', "Foydalanuvchi yuborgan ariza o'chirildi!");
    }


    


}
