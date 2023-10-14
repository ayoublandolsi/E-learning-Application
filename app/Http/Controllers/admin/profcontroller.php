<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apprenant;
use App\Http\Controllers\admin\profcontroller;
use Image;
use App\Models\Prof;
use App\Models\Groupe;
use App\Models\Catego;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class profcontroller extends Controller
{
    public function index(Request $request)

{
 $search = $request->get('search');
            $perPage = 100;

        if (!empty($search)) {
            $apprenants = Prof::where('name', 'LIKE', "%{$search}%")
                ->orderBy('name')
                ->latest()
                ->paginate($perPage);
        } else {
            $apprenants = Prof::latest()
                ->paginate($perPage);
        }

        return view('admin.prof.index', ['apprenant' => $apprenants])
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


     public function create()
     {
        $data['categos']=Catego::select()
        ->orderBy('id','desc')
        -> get();
     return view('admin.prof.create')->with($data);
     }

     public function store(Request $request)
     {
         $data = $request->validate(['name' => ['required', 'string', 'max:255'],
         'img' => 'required|image|mimes:jpg,png',
         'phone' => ['required', 'string', 'max:255'],
         'spec' => ['required', 'string', 'max:255'],
     ]);
        if ($request->hasFile('img')) {
            $new_name = $request->file('img')->hashName();
            $request->file('img')->move(public_path('uploads/prof'),$new_name);

         } else {
            // Handle the case where the file upload is not valid
            }

          Prof::create
          ([ 'name'=> $request->input('name'),
          'phone'=> $request->input('phone'),
          'img'=> $new_name,
          'spec'=> $request->input('spec')
          ]);
       return redirect()->route('admin.prof.index')->with('success', '<<جوك باهي>>The tuteur successfully uploaded.');
    }

    public function cancel()
    {
       session()->flash('error', 'operation canceled.');
    return redirect()->route('admin.prof.index');
    }



public function edit($id)

{
    $data['categos']=Catego::select()
        ->orderBy('id','desc')
        -> get();
    $apprenants = Prof::findOrFail($id);
    return view('admin.prof.edit', compact('apprenants'))->with($data);
}


    public function update(Request $request, Prof $apprenant){
        $data = $request->validate([
            'name' => 'required|string|max:50',

        ]);
$new_name='';
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $new_name = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/prof'), $new_name);
            if ($apprenant->img) {
                unlink(public_path('uploads/prof/'. $apprenant->img));
            }
        } else {
            $new_name = $apprenant->img;
        }

        $apprenant->update([ 'name'=> $request->input('name'),
        'phone'=> $request->input('phone'),
        'img'=> $new_name,
        'spec'=> $request->input('spec')
        ]);


        return redirect()->route('admin.prof.index')->with('success', 'The tuteur has ben update successfully.');


    }
     public function delete($id){

            $old_name=Prof::findOrFail($id )->img;
            Storage::disk('uploads')->delete('prof/'.$old_name);



     Prof::findOrFail($id)->delete();
     return redirect()->route('admin.prof.index')->with('success', 'The tuteur  successfully deleted.');

}







}
