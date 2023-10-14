<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\admincontroller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class admincontroller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $perPage = 100;

        if (!empty($search)) {
            $users = User::where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phonenumber', 'LIKE', "%{$search}%")
                ->orWhere('spec', 'LIKE', "%{$search}%")
                ->where('role', 'admin') // filter by role
                ->orderBy('name')
                ->latest()
                ->paginate($perPage);
        } else {
            $users = User::where('role', 'admin') // filter by role
                ->latest()
                ->paginate($perPage);
        }

        return view('admin.geadmin.index', ['user' => $users])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


 public function create()
 {
 return view('admin.geadmin.create');
 }

 public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=> ['required', 'string', 'max:255'],
        ]);
    }
 public function store(Request $request)
 {
     $this->validator($request->all())->validate();

     $new_name='';
     if ($request->hasFile('img')) {
         $new_name = $request->file('img')->hashName();
         $request->file('img')->move(public_path('uploads/apprenant'), $new_name);

      } else {
         // Handle the case where the file upload is not valid
         }

     $user = User::create([
         'name' => $request->input('name'),
         'email' => $request->input('email'),
         'gendre' => $request->input('gendre'),
         'phonenumber' => $request->input('phonenumber'),
         'img'=>$new_name,
         'spec' => $request->input('spec'),
         'role' => $request->input('role'),
         'state' =>  $request->input('state'),

         'password' => Hash::make($request->input('password')),
     ]);
     return redirect()->route('admin.geadmin.index')->with('success', 'The admin  successfully uploaded.');

    }

public function cancel()
{
   session()->flash('error', 'Add Student canceled.');
return redirect()->route('admin.apprenant.index');
}

public function edit($id)
{
    $apprenants = User::findOrFail($id);
    return view('admin.geadmin.edit', compact('apprenants'));
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

    $apprenant->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'gendre' => $request->input('gendre'),
        'phonenumber' => $request->input('phonenumber'),
        'img'=>$new_name,
        'spec' => $request->input('spec'),
        'role' => $request->input('role'),
        'state' =>  $request->input('state'),
        'password' => Hash::make($request->input('password')),
    ]);
    return redirect()->route('admin.geadmin.index')->with('success', 'The admin has  been updated successfully.');

}


 public function delete($id){

        $old_name=User::findOrFail($id )->img;
        Storage::disk('uploads')->delete('apprenant/'.$old_name);


     User::findOrFail($id)->delete();
          return redirect()->route('admin.geadmin.index')->with('success', 'The admin  successfully deleted.');

    }




    public function show($id)
 {
    $data['$users'] = User::findOrFail($id);
    return view('admin.apprenant.show')->with($data);
 }
}
