<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apprenant;
use App\Http\Controllers\admin\apprenantcontroller;
use Image;
use App\Models\Prof;
use App\Models\Groupe;
use App\Models\Catego;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class apprenantcontroller extends Controller{

    public function index(Request $request)
    {
        $message = '';

        if (auth()->user() && !auth()->user()->hasVerifiedEmail()) {
            $message = 'Please verify your email address.';
        } elseif (session('verified')) {
            $message = '<<جوك باهي>>Your email address has been verified successfully.';
        }

 $search = $request->get('search');
            $perPage = 100;

        if (!empty($search)) {
            $apprenants = User::where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phonenumber', 'LIKE', "%{$search}%")
                ->orWhere('spec', 'LIKE', "%{$search}%")
                ->where('role', 'apprenant') // filter by role
                ->orderBy('name')
                ->latest()
                ->paginate($perPage);
        } else {
            $apprenants = User::where('role', 'apprenant') // filter by role
                ->latest()
                ->paginate($perPage);

        }


        $data['profs']=Prof::select()
        ->orderBy('id','desc')
        -> get();
        $data['courses']=Course::select()
        ->orderBy('id','desc')
        -> get();
        $data['categos']=Catego::select()
        ->orderBy('id','desc')
        -> get();
        $data['groups']=Groupe::select()
        ->orderBy('id','desc')
        -> get();
        $data['apprenant_course'] = DB::table('apprenant_course')->get();

        return view('admin.apprenant.indexx', [
            'apprenant' => $apprenants,
            'message' => $message,
            'userImage' => auth()->user() ? auth()->user()->img : null,
        ])->with($data,'i', (request()->input('page', 1) - 1) * 5);

    }



    public function cancel()
    {
       session()->flash('error', 'Add Student canceled.');
    return redirect()->route('admin.apprenant.index');
    }

    public function courseupdate(Request $request, $id)
    {
        DB::table('apprenant_course')
            ->where('id', $id)
            ->update(['status' => $request->input('status'), 'courstatus' => 'ongoing']);




        DB::table('certificats')->insert([
            'apprenant_course_id' => $id,
            'desc' => 1,
            'certificatee_id' => 2,// Utiliser la propriété catego_id pour l'identifiant de catégorie
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->status == 'accepted') {
            return redirect()->route('admin.group.index')->with('success', 'The apprenant course has been accepted. Please select a group.');
        } else {
            return redirect()->route('admin.apprenant.index')->with('success', 'The apprenant course has been refused.');
        }

        return redirect()->route('apprenant.certificat.index')->with('success', 'The apprenant course has been completed and the certificate has been issued successfully.');
    }


public function edit($id)

{
    $data['categos']=Catego::select()
        ->orderBy('id','desc')
        -> get();
    $apprenants = User::findOrFail($id);

    return view('admin.apprenant.edit', compact('apprenants'))->with($data);
}


    public function update(Request $request, User $apprenant){
        $data = $request->validate([
            'name' => 'required|string|max:50',

        ]);
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $new_name = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/apprenant'), $new_name);
            if ($apprenant->img) {
                unlink(public_path('uploads/apprenant/' . $apprenant->img));
            }
        } else {
        $new_name = $apprenant->img;
        }

        $apprenant->update     ([ 'name'=> $request->input('name'),
        'email'=> $request->input('email'),
        'gendre'=> $request->input('gendre'),
        'phonenumber'=> $request->input('phonenumber'),
        'state'=> $request->input('state'),
        'img'=>$new_name,
        'spec'=> $request->input('spec')
        ]);
        if ($request->state == 'active') {


        return redirect()->route('admin.apprenant.index')->with('success', '<<جوك باهي>>The compte  has been activated successfully.');
    }else{
        return redirect()->route('admin.apprenant.index')->with('success', '<<جوك باهي>>The compte  has been desactivated successfully.');

    }
    }
     public function delete($id){

            $old_name=User::findOrFail($id )->img;
            Storage::disk('uploads')->delete('apprenant/'.$old_name);



     User::findOrFail($id)->delete();
     return redirect()->route('admin.apprenant.index')->with('success', '<<جوك باهي>>The apprenant  successfully deleted.');

}




        public function show($id)
     {
        $data['apprenant'] = User::findOrFail($id);
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


    return view('admin.apprenant.show')->with($data);
    }


    }
