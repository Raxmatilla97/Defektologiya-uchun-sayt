<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\specialist;
use Illuminate\Http\Request;

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
        dd($request);
    }



    
}
