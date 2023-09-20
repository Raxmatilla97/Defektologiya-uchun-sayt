<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function registerUsersList()
    {
        $register_users_list = User::orderBy('created_at', 'desc')->paginate(15);
       
        return view('site-pages.pages.dashboard.register-users-list', compact('register_users_list'));
    }
    
}
