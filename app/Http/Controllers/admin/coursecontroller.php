<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\coursecontroller;
use App\Models\Course;
use Illuminate\Http\Request;
use Image;
use App\Models\Prof;
use App\Models\Catego;
use App\Models\Apprenant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class coursecontroller extends Controller
{
    public function index(Request $request)
    {


        $search = $request->get('search');
        $perPage = 100;

        if (!empty($search)) {
            $courses = Course::where('name', 'LIKE', "%{$search}%")
                ->orWhere('smalldesc', 'LIKE', "%{$search}%")
                ->orderBy('name')
                ->latest()
                ->paginate($perPage);
        } else {
            $courses = Course::latest()->paginate($perPage);
        }

        return view('admin.course.index', ['courses' => $courses, ])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data['profs']=Prof::select('id','name','spec','img')
        ->orderBy('id','desc')
        -> get();
        $data['categos']=Catego::select('id','name',)
        ->orderBy('id','desc')
        -> get();

    return view('admin.course.create')->with($data);
    }

    public function store(Request $request)
    {
        $data['profs']=Prof::select('id','name','spec','img')
        ->orderBy('id','desc')
        -> get();
        $data['categos']=Catego::select('id','name',)
        ->orderBy('id','desc')
        -> get();
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'img' => 'required|image|mimes:jpg,png',
            'smalldesc'=>'required|string|max:50'
        ]);
       if ($request->hasFile('img')) {
           $new_name = $request->file('img')->hashName();
           $request->file('img')->move(public_path('uploads/courses'), $new_name);

        } else {
           // Handle the case where the file upload is not valid
           }

         Course::create
         ([ 'name'=> $request->input('name'),
         'smalldesc'=> $request->input('smalldesc'),
         'desc'=> $request->input('desc'),
         'price'=> $request->input('price'),
         'prof_id'=> $request->input('prof_id'),
         'catego_id'=> $request->input('catego_id'),
         'duree'=> $request->input('duree'),
         'img'=>$new_name,
         ]);
      return redirect()->route('admin.course.index')->with('success', '<<جوك باهي>>The course successfully uploaded.');
   }

   public function cancel()
   {
      session()->flash('error', 'the operation  canceled.');
   return redirect()->route('admin.course.index');
   }

   public function edit($id)
   {
    $data['profs']=Prof::select('id','name','spec','img')
        ->orderBy('id','asc')
        -> get();
        $data['categos']=Catego::select('id','name',)
        ->orderBy('id','desc')
        -> get();
       $courses = Course::findOrFail($id);
       return view('admin.course.edit', compact('courses'))->with($data);;
   }

   public function update(Request $request, Course $course){
       $data = $request->validate([
           'name' => 'required|string|max:50',

       ]);

       if ($request->hasFile('img')) {
        $img = $request->file('img');
        $new_name = uniqid() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('uploads/courses'), $new_name);
        $data['img'] = $new_name;
        if ($course->img && file_exists(public_path('uploads/courses/' . $course->img))) {
            unlink(public_path('uploads/courses/' . $course->img));
        }
    } else {
        $data['img'] = $course->img;
    }

       $course->update([ 'name'=> $request->input('name'),
       'smalldesc'=> $request->input('smalldesc'),
       'desc'=> $request->input('desc'),
       'price'=> $request->input('price'),
       'prof_id'=> $request->input('prof_id'),
       'catego_id'=> $request->input('catego_id'),
       'duree'=> $request->input('duree'),
       'img'=>$new_name,
       ]);
       return redirect()->route('admin.course.index')->with('success', '<<جوك باهي>> The course has been updated successfully.');
   }


    public function delete($id){

           $old_name=Course::findOrFail($id )->img;
           Storage::disk('uploads')->delete('course/'.$old_name);


        Course::findOrFail($id)->delete();
             return redirect()->route('admin.course.index')->with('success', '<<جوك باهي>>The course  successfully deleted.');

       }




       public function show($id)
    {
       $data['courses'] = Course::findOrFail($id);
       return view('admin.course.show')->with($data);
    }




}
