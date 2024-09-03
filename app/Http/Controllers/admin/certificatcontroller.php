<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apprenant;
use App\Http\Controllers\admin\certificatcontroller;
use App\Models\Prof;
use App\Models\Certificatee;
use App\Models\Groupe;
use App\Models\Catego;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class certificatcontroller extends Controller
{
    public function index(Request $request)

{
 $search = $request->get('search');
            $perPage = 100;

        if (!empty($search)) {
            $certifi = Certificatee::where('name', 'LIKE', "%{$search}%")
                ->orderBy('name')
                ->latest()
                ->paginate($perPage);
        } else {
            $certifi =Certificatee::latest()
                ->paginate($perPage);
        }

        return view('admin.certificat.index', ['certifi' => $certifi])
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


     public function create()
     {
        $data['categos']=Catego::select()
        ->orderBy('id','desc')
        -> get();
        $data['profs']=Prof::select()
        ->orderBy('id','desc')
        -> get();
        $data['courses']=Course::select()
        ->orderBy('id','desc')
        -> get();
     return view('admin.certificat.create')->with($data);
     }

     public function store(Request $request)
     {
         $data = $request->validate(['name' => ['required', 'string', 'max:255'],

     ]);


         Certificatee::create
          ([ 'name'=> $request->input('name'),
          'desc'=> $request->input('desc'),
          'course_id'=>$request->input('course_id'),
          'prof_id'=> $request->input('prof_id'),
          'catego_id'=> $request->input('catego_id')
          ]);
       return redirect()->route('admin.certificat.index')->with('success', '<<جوك باهي>>The Certificats successfully uploaded.');
    }

    public function cancel()
    {
       session()->flash('error', 'operation canceled.');
    return redirect()->route('admin.certificat.index');
    }



public function edit($id)

{
    $data['categos']=Catego::select()
        ->orderBy('id','desc')
        -> get();
        $data['profs']=Prof::select()
        ->orderBy('id','desc')
        -> get();
        $data['courses']=Course::select()
        ->orderBy('id','desc')
        -> get();
    $certifi =Certificatee::findOrFail($id);
    return view('admin.certificat.edit', compact('certifi'))->with($data);
}


public function update(Request $request, Certificatee $certificate){
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
    ]);

    $certificate->update([
        'name' => $request->input('name'),
        'desc' => $request->input('desc'),
        'course_id' => $request->input('course_id'),
        'prof_id' => $request->input('prof_id'),
        'catego_id' => $request->input('catego_id'),
    ]);

    return redirect()->route('admin.certificat.index')->with('success', 'The certificat has been updated successfully.');
}
     public function delete($id){




    Certificatee::findOrFail($id)->delete();
     return redirect()->route('admin.certificat.index')->with('success', 'The certificate  successfully deleted.');

}

}
