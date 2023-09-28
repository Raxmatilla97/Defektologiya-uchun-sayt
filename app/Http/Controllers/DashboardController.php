<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\specialist;
use App\Models\StudentCourse;
use App\Models\VideoDarslar;
use App\Models\News;
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
            'all_couses_tasdiqlash_kerak_paginate',
        ));
    }


    public function registerUsersList($request)
    {          
        $all_users = User::where('status', '1')->orderBy('created_at', 'desc')->get();
        $specialistCount = $all_users->pluck('specialist')->where('status', '1')->count();
        
        $noactiveStatus = $all_users->pluck('specialist')->where('status', '0')->count();
        $noactiveStatusAllUsers = User::where('status', '0')->count();

           
        if ($request == 'register-users') {

            $users = User::orderBy('created_at', 'desc')->paginate(15);

        }elseif ($request == 'mutaxasis-users') {

            $users = User::whereHas('specialist', function ($query) {
                $query->where('status', '1');
            })->where('status', '1')->orderBy('created_at', 'asc')->paginate(15);

        }elseif ($request == 'mutaxasis-ariza-users') {

            $users = User::whereHas('specialist', function ($query) {
                $query->where('status', '0');
            })->where('status', '1')->orderBy('created_at', 'desc')->paginate(15);      

        }elseif ($request == 'ban-users') {

            $users = User::where('status', '0')->orderBy('created_at', 'desc')->paginate(15);

        }elseif ($request == 'ruxsat-soraganlar') {
                      
            $users = User::whereHas('studentCourse', function ($query) {
                $query->where('sorov_holati', 'tekshirilmoqda');
            })->where('status', '1')->orderBy('created_at', 'desc')->paginate(15); 
        }
        return view('site-pages.pages.dashboard.register-users-list', compact('users', 'all_users', 'specialistCount', 'noactiveStatus', 'noactiveStatusAllUsers'));
    }


    public function userDestroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->back()->with('error', 'Foydalanuvchi topilmadi'); // Ariza topilmadi xabarini qaytarish
        }
        
        $user->delete();
        
        return redirect()->back()->with('status', "Ro'yxatdan o'tgan foydalanuvchi o'chirildi!");
    }

   
    public function testIndex()
    {

        return view('site-pages.pages.dashboard.specialists.test');
    }
    
  



  
    
}
