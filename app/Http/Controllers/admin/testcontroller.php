<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\testcontroller;
use Image;
use App\Models\Prof;
use App\Models\Groupe;
use App\Models\Catego;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Test;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class testcontroller extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $perPage = 100;

        if (!empty($search)) {
            $tests = Test::where('desc', 'LIKE', "%{$search}%")
                ->orderBy('desc')
                ->latest()
                ->paginate($perPage);
        } else {
            $tests = Test::select()->latest()->paginate($perPage);
        }

        $data['profs'] = Prof::orderBy('id', 'desc')->get();
        $data['courses'] = Course::orderBy('id', 'desc')->get();
        $data['categos'] = Catego::orderBy('id', 'desc')->get();
        $data['groups'] = Groupe::orderBy('id', 'desc')->get();
        $data['apprenant_course'] = DB::table('apprenant_course')->get();

        // Retrieve the course and category names for each test
        foreach ($tests as $test) {
            $data['course'] = Course::find($test->course_id);
            $data['catego'] = Catego::find($test->catego_id);


        }

        return view('admin.test.index', [
            'tests' => $tests,

        ])->with($data,'i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data['courses']=Course::select()
        ->orderBy('id','desc')
        -> get();
        $data['categos']=Catego::select('id','name',)
        ->orderBy('id','desc')
        -> get();

    return view('admin.test.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'desc' => 'required|string|max:50',
            'img' => 'required|image|mimes:jpg,png',
            'date' => 'required|date|after_or_equal:today',

        ]);
       if ($request->hasFile('img')) {
           $new_name = $request->file('img')->hashName();
           $request->file('img')->move(public_path('uploads/test'), $new_name);

        } else {
           // Handle the case where the file upload is not valid
           }

         Test::create
         ([
         'desc'=> $request->input('desc'),
         'date'=> $request->input('date'),
         'course_id'=> $request->input('course_id'),
         'catego_id'=> $request->input('catego_id'),
         'img'=>$new_name,
         ]);
      return redirect()->route('admin.test.index')->with('success', '<<جوك باهي>>The test successfully uploaded.');
   }




    public function cancel()
    {
       session()->flash('error', 'the operation  canceled.');
    return redirect()->route('admin.test.index');
    }






public function edit($id)

{
    $data['courses']=Course::select()
    ->orderBy('id','desc')
    -> get();
    $data['categos']=Catego::select('id','name',)
    ->orderBy('id','desc')
    -> get();
    $tests = Test::findOrFail($id);

    return view('admin.test.edit', compact('tests'))->with($data);
}


    public function update(Request $request, Test $test){
        $data = $request->validate([
            'desc' => 'required|string|max:50',
            'date' => 'required|date|after_or_equal:today',


        ]);
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $new_name = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/test'), $new_name);
            if ($test->img) {
                unlink(public_path('uploads/test/' . $test->img));
            }
        } else {
        $new_name = $test->img;
        }

        $test->update     ([
             'desc'=> $request->input('desc'),
        'date'=> $request->input('date'),
        'course_id'=> $request->input('course_id'),
        'catego_id'=> $request->input('catego_id'),
        'img'=>$new_name,
        ]);


        return redirect()->route('admin.test.index')->with('success', '<<جوك باهي>>The test has been updated successfully.');

    }
     public function delete($id){

            $old_name=Test::findOrFail($id )->img;
            Storage::disk('uploads')->delete('test/'.$old_name);



     Test::findOrFail($id)->delete();
     return redirect()->route('admin.test.index')->with('success', '<<جوك باهي>>The test  successfully deleted.');

}




        public function show($id)
     {
        $data['test'] = Test::findOrFail($id);
        $data['profs']=Prof::select()
        ->orderBy('id','desc')
        -> get();
        $data['courses']=Course::select()
        ->orderBy('id','desc')
        -> get();
        $data['categos']=Catego::select()
        ->orderBy('id','desc')
        -> get();
        $data['groups']=Catego::select()
        ->orderBy('id','desc')
        -> get();


    return view('admin.test.show')->with($data);
    }
}
