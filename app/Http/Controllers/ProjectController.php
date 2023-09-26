<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function projectIndex()
    {
        $allProjects = Project::orderBy('created_at', 'desc')->paginate(15);

        return view('site-pages.pages.dashboard.projects.index', compact('allProjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function projectCreate()
    {
        return view('site-pages.pages.dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function projectStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',          
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',          
            'desc' => 'required|string',
            'status' => 'boolean'          
        ],
        [
            'title.required' => "Proyekt nomini yozishingiz kerak!",
            'image.required' => "Proyekt suratini yuklashingiz kerak!",
            'image.image' => "Proyekt uchun rasm formatida fayl yuklashingiz kerak!",
            'image.mimes' => "Proyekt rasmi faqat jpeg, png, jpg, gif formatlari qabul qilinadi!",
            'image.max' => "Proyekt rasmi hajmi 2048KB dan oshmasligi kerak!",
            'desc.required' => "Proyekt haqida yozishingiz kerak!",
            'status.boolean' => "Proyekt barchaga ko'rinarli yoki yo'qligini belgilang!",
        ]);

    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $filename, 'public');
            $validatedData['image'] = $filePath;
        }

        $slug = Str::slug($validatedData['title']) . '_' . now();
      
        $project = new Project();
        $project->title = $validatedData['title'];
        $project->slug = $slug;
        $project->image = $validatedData['image'];            
        $project->desc = $validatedData['desc'];
        $project->status = $validatedData['status'];         
    
        $project->save();

        return redirect()->route('dashboard.projectIndex')->with('status', "Siz proyekt yaratdingiz!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function projectEdit($slug)
    {
        $edit_info = Project::where('slug', $slug)->first();
        
        return view('site-pages.pages.dashboard.projects.edit', compact('edit_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function projectUpdate(Request $request, Project $project)
    {
          
        $projectUpdate = Project::find($request->id);
        $projectUpdate->title = $request->input('title'); 
        $projectUpdate->desc = $request->input('desc');
        $projectUpdate->status = $request->input('status', false); 
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $filename, 'public');
            $projectUpdate->image = $filePath;
        } else {
            $projectUpdate->image = $request->input('image_old', $projectUpdate->image);
        }       
        
        
        $projectUpdate->save();

        return redirect()->route('dashboard.projectIndex')->with('status', "Sizning ". $projectUpdate->title ." nomli proyektingiz o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function projectDestroy($id)
    {
        $projectDelete = Project::find($id);
        
        if (!$projectDelete) {
            return redirect()->back()->with('error', 'Proyekt topilmadi'); // Ariza topilmadi xabarini qaytarish
        }
        
        $projectDelete->delete();
        
        return redirect()->back()->with('status', "Proyekt o'chirildi!");
    }

    public function projectSearch(Request $request)
    {
        $title = $request->input('title');
      
        
        $query = Project::query();
             
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }
      
        $allProjects = $query->paginate(15);
       
      return view('site-pages.pages.dashboard.projects.index', compact('allProjects'));   
    }
}
