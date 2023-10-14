<?php

namespace App\Http\Controllers\apprenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\apprenant\groupcontroller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Models\Apprenant;
use App\Models\Catego;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use App\Models\Groupe;
use App\Models\Course;
use App\Models\Test;
use App\Models\Certificat;

use App\Models\Prof;
use Illuminate\Validation\Rule;
use Image;


class gererapprenantcontroller extends Controller

{
    public function login(){
        return view('apprenant.gerer.loginapprenant');
    }
    public function login1(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.apprenant.index');
            } else {
                if (auth()->user() && !auth()->user()->hasVerifiedEmail()) {
                    // Display "Please verify your email address" message
                    return redirect()->route('apprenant.gerer.index')->with('message', 'Please verify your email address.');
                } elseif (session('verified') && !session('success')) {
                    // Display "Your email address has been verified successfully" message as a session message if not already displayed
                    session()->flash('success', 'Your email address has been verified successfully.');
                }
                return redirect()->route('apprenant.gerer.index');
            }
        } else {
            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }





    public function index()
{
    $user = auth()->user(); // Récupération de l'utilisateur connecté
    $data['apprenants'] = $user; // Stockage de l'utilisateur dans le tableau associatif $data

    $data['courses'] = Course::orderBy('id','desc')->get(); // Récupération des informations de tous les cours
    $data['categos'] = Catego::orderBy('id','desc')->get(); // Récupération des informations de toutes les catégories
    $data['groups'] = Groupe::orderBy('id','desc')->get(); // Récupération des informations de tous les groupes
    $id = auth()->user()->id;
    $data['apprenant_course'] = DB::table('apprenant_course')
    ->where('apprenant_id', $id)
    ->get();
    $data['apprenant_courses'] = DB::table('apprenant_course')
    ->join('courses', 'apprenant_course.course_id', '=', 'courses.id')
    ->join('groupes', 'apprenant_course.groupe_id', '=', 'groupes.id')
    ->where('apprenant_course.apprenant_id', $id)
    ->select('apprenant_course.*', 'courses.name', 'groupes.name as group_name')
    ->get();

    return view('apprenant.gerer.index', [
        'userImage' => $user ? $user->img : null, // Récupération de l'image de profil de l'utilisateur connecté (s'il y en a une)
    ])->with($data); // Passage des données à la vue
}
public function courses()
{
    $user = auth()->user();
    $data['apprenants'] = $user;

    $data ['courses'] = Course::leftJoin('apprenant_course', 'courses.id', '=', 'apprenant_course.course_id')
                        ->where('apprenant_course.apprenant_id', $user->id)
                        ->whereNotNull('apprenant_course.course_id')
                        ->orderBy('courses.id', 'desc')
                        ->get();

    // Récupération des vidéos associées à chaque cours
    $data ['videos'] = [];
    foreach($data['courses'] as $course) {
        $videos = Video::where('course_id', $course->id)->orderBy('id', 'desc')->get();
        $data['videos'][$course->id] = $videos;
    }

    return view('apprenant.gerer.courses', [
        'userImage' => $user ? $user->img : null,
    ])->with($data);
}

public function inndex()
{

    return redirect()->route('apprenant.gerer.index')->with('success', '<<جوك باهي>> your test  has  been send to the admin  successfully will correct and send the result.');
}

public function video($id)
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

           return view('apprenant.gerer.video', compact('videos'));
       }




public function edit($id)
{

 $user = auth()->user(); // Récupération de l'utilisateur connecté
 $data['apprenants'] = $user; // Stockage de l'utilisateur dans le tableau associatif $data

 $data['courses'] = Course::orderBy('id','desc')->get(); // Récupération des informations de tous les cours
 $data['categos'] = Catego::orderBy('id','desc')->get(); // Récupération des informations de toutes les catégories
 $data['groups'] = Groupe::orderBy('id','desc')->get(); // Récupération des informations de tous les groupes


 $user = auth()->user(); // Récupération de l'utilisateur connecté
 $data['apprenants'] = $user;

    return view('apprenant.gerer.edit', [
     'userImage' => $user ? $user->img : null, // Récupération de l'image de profil de l'utilisateur connecté (s'il y en a une)
 ])->with($data);
    }

 public function update (Request $request, User $apprenant)
   {
     $data = $request->validate([
    'name' => 'required|string|max:50',

]);
if ($request->hasFile('image')) {
    $img = $request->file('image');
    $new_name = uniqid() . '.' . $img->getClientOriginalExtension();
    $img->move(public_path('uploads/apprenant'), $new_name);
    if ($apprenant->img) {
        unlink(public_path('uploads/apprenant/' . $apprenant->img));
    }
} else {
$new_name = $apprenant->img;
}
$apprenant->update     ([
    'name'=> $request->input('name'),
'email'=> $request->input('email'),
'phonenumber'=> $request->input('phonenumber'),
'img'=>$new_name,
]);

       return redirect()->route('apprenant.gerer.index')->with('success', '<<جوك باهي>> your information has  been updated successfully.');
    }




    public function addcourse(Request $request){

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

        return view('apprenant.gerer.addcourse', ['courses' => $courses, ])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function send(Request $request)
    {
        $message = $request->input('message');
        $apprenant_id = $request->input('apprenant_id');
        $course_id = $request->input('course_id');
        $status = $request->input('status');

        if ($status == 'pending') {
            // Récupérer les données du cours à partir de la base de données
            $course = DB::table('courses')->where('id', $course_id)->first();

            DB::table('apprenant_course')->insert([
                'message' => $message,
                'course_id' => $course_id,
                'apprenant_id' => $apprenant_id,
                'status'=> $status,
            ]);

            return  redirect()->route('apprenant.gerer.addcourse',)->with([
                'success' => 'your request to join ' . strtolower($course->name)  . ' has been sent to the admin'
            ]);

        } else {
            $courstatus = $request->input('courstatus');

            DB::table('apprenant_course')
                ->where('apprenant_id', $apprenant_id)
                ->where('course_id', $course_id)
                ->update([
                    'message' => $message,
                    'status'=> $status,
                    'courstatus'=> $courstatus,
                ]);

            return redirect()->route('apprenant.gerer.index')
                ->with('success', '<<جوك باهي>> your test has been sent to the admin successfully, it will be corrected and the result will be sent back to you.');
        }
    }


            public function courseupdate(Request $request, $id){

                DB::table('apprenant_course')->where('id',$id) ->update(['status' => $request->input('status'),
                'courstatus' => 'ongoing']);

                if ($request->status == 'accepted') {

                    return redirect()->route('admin.group.index')->with('success', '<<جوك باهي>>The has apprenant has been accepted please select a groupe successfully.');
                }else{
                    return redirect()->route('admin.apprenant.index')->with('success', '<<جوك باهي>>The has apprenant has been refused !!.');
                }
            }














public function show($id)
{
    $user = auth()->user();
    $data['apprenants'] = $user;

   $data['courses'] = Course::findOrFail($id);
   return view('apprenant.gerer.course')->with($data);
}




public function leson($id)
{
    // Retrieve the currently logged-in user
    $user = Auth::user();

    // Retrieve the selected course
    $course = Course::findOrFail($id);

    // Retrieve the list of videos associated with the course
    $videos = Video::where('course_id', $id)->get();

    // Add professor and course details to each video
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

    // Pass the user, course, and video data to the view
    return view('apprenant.gerer.leson', compact('user', 'course', 'videos'));
}
public function  watch_video($id){
    $user = Auth::user();
    $video= Video::findOrFail($id);
    $prof = Prof::findOrFail($video->prof_id);
    $course = Course::findOrFail($video->course_id);




    return view('apprenant.gerer.watch-video', compact('user','video','course','prof'));


}

public function examan($id){
    $test = Test::where('course_id', $id)->first();
    $user = auth()->user();
    $apprenants = $user;
    $course = Course::findOrFail($id);
    $catego = Catego::findOrFail($course->catego_id);
    return view('apprenant.gerer.examan', compact('test', 'course', 'catego','apprenants'));
}


    }
