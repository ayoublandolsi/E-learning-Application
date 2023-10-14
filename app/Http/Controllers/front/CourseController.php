<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function catego($id)
    {
        $data['catego']=catego::findOrFail($id);
    $data['courses']= Course::where(cat_id,$id)->get();
return view ('courses.cat')->with($data);    }
}
