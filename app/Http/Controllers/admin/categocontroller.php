<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catego;
use App\Http\Controllers\admin\categocontroller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;




class categocontroller extends Controller{

    public function index(Request $request)
    {
        $message = '';

        if (auth()->user() && !auth()->user()->hasVerifiedEmail()) {
            $message = 'Please verify your email address.';
        } elseif (session('verified')) {
            $message = 'Your email address has been verified successfully.';
        }

        $search = $request->get('search');
        $perPage = 100;

        if (!empty($search)) {
            $categos = Catego::where('name', 'LIKE', "%{$search}%")
                ->orderBy('name')
                ->latest()
                ->paginate($perPage);
        } else {
            $categos = Catego::latest()->paginate($perPage);
        }

        return view('admin.catego.index', ['catego' => $categos, 'message' => $message])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


     public function create()
     {
     return view('admin.catego.create');
     }

     public function store(Request $request)
     {
         $data = $request->validate([
             'name' => 'required|string|max:50',

         ]);


          Catego::create
          ([ 'name'=> $request->input('name'),

          ]);
       return redirect()->route('admin.catego.index')->with('success', 'The specialite  successfully uploaded.');
    }

    public function cancel()
    {
       session()->flash('error', 'Add specialite canceled.');
    return redirect()->route('admin.catego.index');
    }

    public function edit($id)
    {
        $categos = Catego::findOrFail($id);
        return view('admin.catego.edit', compact('categos'));
    }

    public function update(Request $request, Catego $categos){
        $data = $request->validate([
            'name' => 'required|string|max:50', ]);

        $categos->update   ([ 'name'=> $request->input('name'), ]);
        return redirect()->route('admin.catego.index')->with('success', 'The specialite has been updated successfully.');
    }


     public function delete($id){


         Catego::findOrFail($id)->delete();
              return redirect()->route('admin.catego.index')->with('success', 'The categories  successfully deleted.');

        }




    }
