<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Video;
use Image;
use App\Models\Prof;
use App\Models\Catego;
use App\Models\Apprenant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class videocontroller extends Controller
{
    public function index(Request $request)
{
    $search = $request->get('search');
    $perPage = 100;

    if (!empty($search)) {
        $videos = Video::where ('name', 'LIKE', "%{$search}%")
            ->orWhere('desc', 'LIKE', "%{$search}%")
            ->orderBy('name')
            ->latest()
            ->paginate($perPage);
    } else {
        $videos = Video::latest()->paginate($perPage);
    }

    $profs = Prof::select('id','name','spec','img')
        ->orderBy('id','desc')
        ->get();

    // Loop through each video to get the professor information
    foreach ($videos as $video) {
        $prof_id = $video->prof_id;
        $prof = Prof::where('id', $prof_id)->first();
        $video->prof_name = $prof->name;
        $video->prof_spec = $prof->spec;
        $video->prof_img = $prof->img;

        $course_id = $video->course_id;
        $course = Course::where('id', $course_id)->first();
        $video->course_name = $course->name;
    }

    return view('admin.video.index', compact('videos'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}
    public function create()
    {
        $data['courses']=Course::select('id','name','desc','img')
                ->orderBy('id','desc')
                ->get();
        $data['profs']=Prof::select('id','name','spec','img')
                ->orderBy('id','desc')
                ->get();
        return view('admin.video.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
        ]);
        if ($request->hasFile('video')) {
            $name = $request->file('video')->hashName();
            $request->file('video')->move(public_path('uploads/video'), $name);
        } else {
            // Handle invalid file upload
        }

        Video::create([
            'name' => $request->input('name'),
            'desc' => $name,
            'duree' => $request->input('duree'),
            'prof_id' => $request->input('prof_id'),
            'course_id' => $request->input('course_id'),
        ]);
        return redirect()->route('admin.video.index')->with('success', 'The lesson was successfully uploaded.');
    }

    public function cancel()
    {
       session()->flash('error', 'The operation was canceled.');
       return redirect()->route('admin.video.index');
    }

    public function edit($id)
    {
        $data['courses']=Course::select('id','name','desc','img')
                ->orderBy('id','desc')
                ->get();
        $data['profs']=Prof::select('id','name','spec','img')
                ->orderBy('id','desc')
                ->get();
        $course = Video::findOrFail($id);
        return view('admin.video.edit', compact('course'))->with($data);
    }

    public function update(Request $request, Video $course)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        if ($request->hasFile('desc')) {
            $video = $request->file('desc');
            $new_name = uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/video'), $new_name);
            if ($course->desc && file_exists(public_path('uploads/video/' . $course->desc))) {
                unlink(public_path('uploads/video/' . $course->desc));
            }
        } else {
            $new_name = $course->desc;
        }
$course_id=$course->course_id;
        $course->update ([
         'name' => $request->input('name'),
        'desc' => $new_name,
        'duree' => $request->input('duree'),
        'prof_id' => $request->input('prof_id'),
        'course_id' => $request->input('course_id'),
    ]);
        return redirect()->route('admin.video.show',$course_id)->with('success', 'The lesson has been updated successfully.');
    }


        public function delete($id){

               $old_name=Video::findOrFail($id )->video;
               Storage::disk('uploads')->delete('video/'.$old_name);


            Video::findOrFail($id)->delete();
                 return redirect()->route('admin.video.index')->with('success', '<<جوك باهي>>The lesson successfully deleted.');

           }



           public function show($id)
           {
               $videos = Video::where('course_id', $id)->get();

               foreach ($videos as $video) {
                   $prof_id = $video->prof_id;
                   $prof = Prof::where('id', $prof_id)->first();
                   $video->prof_name = $prof->name;
                   $video->prof_spec = $prof->spec;
                   $video->prof_img = $prof->img;

                   $course_id = $video->course_id;
                   $course = Course::where('id', $course_id)->first();
                   $video->course_name = $course->name;
               }

               return view('admin.video.index', compact('videos'));
           }





    }

