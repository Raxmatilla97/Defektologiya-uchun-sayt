<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class CkeditorController extends Controller
{
    public function index(): View
    {
        return view('ckeditor');
    }

    public function upload(Request $request): JsonResponse
    {
        $imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location'=> "/storage/$imgpath"]);
    }

   
}
