<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Prof;
use App\Models\Apprenant;




class homepagecontroller extends Controller
{
    public function index(){
        $data['courses']=Course::select('id','name','smalldesc','catego_id','prof_id','duree','img','price')
        ->orderBy('id','asc')
        ->take(3)
        -> get();
        $data['profs']=Prof::select('id','name','spec','img')
        ->orderBy('id','asc')
        ->take(4)
        -> get();
        return view('index')->with($data);
    }
}
