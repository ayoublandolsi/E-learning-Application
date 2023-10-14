<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\groupcontroller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Apprenant;
use App\Models\Catego;
use App\Models\Groupe;
use App\Models\User;
use App\Models\Course;
use App\Models\Prof;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Image;


class groupcontroller extends Controller
{
    public function index(Request $request)
    {

        $search = $request->get('search');
        $perPage = 100;

        if (!empty($search)) {
            $groupes = Groupe::where('name', 'LIKE', "%{$search}%")
                ->latest()
                ->distinct('name')
                ->paginate($perPage);
        } else {

            $groupes = Groupe::select()
                ->distinct('name')
                ->paginate($perPage);
        }
        return view('admin.Group.index', ['groupes' => $groupes, ])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data['profs']=Prof::select('id','name','spec','img')
        ->orderBy('id','desc')
        -> get();
        $data['apprenants']=User::select('id','name',)
        ->orderBy('id','desc')
        -> get();
        $data['courses']=Course::select('id','name',)
        ->orderBy('id','desc')
        -> get();
        $data['categos']=Catego::select('id','name',)
        ->orderBy('id','desc')
        -> get();

    return view('admin.group.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|unique:groupes',
            'datedeb' => 'required|date|after_or_equal:today',
        'datefin' => 'required|date|after:datedeb',
        'datetest' => 'required|date|after_or_equal:datedeb|before_or_equal:datefin',
        'prof_id' => 'required',
        'catego_id' => 'required',
        'number' => 'required',
        'apprenant_id' => 'required',
        'course_id' => 'required',
    ]);


         Groupe::create
         ([ 'name'=> $request->input('name'),
         'datedeb'=> $request->input('datedeb'),
         'datefin'=> $request->input('datefin'),
         'datetest'=> $request->input('datetest'),
         'prof_id'=> $request->input('prof_id'),
         'catego_id'=> $request->input('catego_id'),
         'number'=> $request->input('number'),
         'apprenant_id'=> $request->input('apprenant_id'),
         'course_id'=> $request->input('course_id'),

         ]);
      return redirect()->route('admin.group.index')->with('success', '<<جوك باهي>>The Group successfully uploaded.');
   }

   public function cancel()
   {
      session()->flash('error', '<<متخافش لاتقلق>>the operation  canceled.');
   return redirect()->route('admin.group.index');
   }

   public function edit($id)
   {
    $data['profs']=Prof::select('id','name','spec','img')
    ->orderBy('id','desc')
    -> get();
    $data['apprenants']=User::select('id','name',)
    ->orderBy('id','desc')
    -> get();
    $data['courses']=Course::select('id','name',)
    ->orderBy('id','desc')
    -> get();
    $data['categos']=Catego::select('id','name',)
    ->orderBy('id','desc')
    -> get();
       $groupes = Groupe::findOrFail($id);
       return view('admin.group.edit', compact('groupes'))->with($data);;
   }
   public function addprof($id)
   {
    $data['profs']=Prof::select('id','name','spec','img')
    ->orderBy('id','desc')
    -> get();
    $data['apprenants']=Apprenant::select('id','name',)
    ->orderBy('id','desc')
    -> get();
    $data['courses']=Course::select('id','name',)
    ->orderBy('id','desc')
    -> get();
    $data['categos']=Catego::select('id','name',)
    ->orderBy('id','desc')
    -> get();
       $groupes = Groupe::findOrFail($id);
       return view('admin.group.addprof', compact('groupes'))->with($data);;
   }
   public function addstud($id)
   {
    $data['profs']=Prof::select('id','name','spec','img')
    ->orderBy('id','desc')
    -> get();
    $data['apprenants'] = User::select('id', 'name')
    ->where('role', 'apprenant')
    ->orderBy('id', 'desc')
    ->get();
    $data['courses']=Course::select('id','name',)
    ->orderBy('id','desc')
    -> get();
    $data['categos']=Catego::select('id','name',)
    ->orderBy('id','desc')
    -> get();
       $groupes = Groupe::findOrFail($id);
       return view('admin.group.addstud', compact('groupes'))->with($data);;
   }
   public function addcourse($id)
   {
    $data['profs']=Prof::select('id','name','spec','img')
    ->orderBy('id','desc')
    -> get();
    $data['apprenants']=Apprenant::select('id','name',)
    ->orderBy('id','desc')
    -> get();
    $data['courses']=Course::select('id','name',)
    ->orderBy('id','desc')
    -> get();
    $data['categos']=Catego::select('id','name',)
    ->orderBy('id','desc')
    -> get();
       $groupes = Groupe::findOrFail($id);
       return view('admin.group.addcourse', compact('groupes'))->with($data);;
   }

   public function update(Request $request, Groupe $group)
   {
       $data = $request->validate([
          'number' => 'required',


]);

       $groups = Groupe::where('name', $request->input('name'))->get();

       foreach ($groups as $group) {
           $group->update([
               'datedeb' => $request->input('datedeb'),
               'datefin' => $request->input('datefin'),
               'datetest' => $request->input('datetest'),
               'number' => $request->input('number'),
           ]);
       }

       return redirect()->route('admin.group.index')->with('success', '<<جوك باهي>> The professeur has been updated successfully.');
    }

   public function updatee(Request $request, Groupe $groupes)
   {
    $data = $request->validate([
        'prof_id' => [
            'required',
            function($attribute, $value, $fail) use ($request, $groupes) {
                $count = $groupes->where('name', $request->input('name'))
                                 ->where('prof_id', $value)
                                 ->count();
                if ($count > 0) {
                    $fail('The selected prof already exists in this group.');
                }
            }
        ]
        // add other validation rules for other attributes as needed
    ]);

        Groupe::create
        ([ 'name'=> $request->input('name'),
        'datedeb'=> $request->input('datedeb'),
        'datefin'=> $request->input('datefin'),
        'datetest'=> $request->input('datetest'),
        'prof_id'=> $request->input('prof_id'),
        'catego_id'=> $request->input('catego_id'),
        'number'=> $request->input('number'),
        'apprenant_id'=> $request->input('apprenant_id'),
        'course_id'=> $request->input('course_id'),

        ]);

       return redirect()->route('admin.group.index')->with('success', '<<جوك باهي>> The professeur has been updated successfully.');
   }
   public function addstudd(Request $request, Groupe $groupes)
   {
    $data = $request->validate([
        'apprenant_id' => [
            'required',
            function($attribute, $value, $fail) use ($request, $groupes) {
                $count = $groupes->where('name', $request->input('name'))
                                 ->where('apprenant_id', $value)
                                 ->count();
                if ($count > 0) {
                    $fail('The selected apprenant already exists in this group.');
                }
            }
        ]
        // add other validation rules for other attributes as needed
    ]);

    Groupe::create
    ([ 'name'=> $request->input('name'),
    'datedeb'=> $request->input('datedeb'),
    'datefin'=> $request->input('datefin'),
    'datetest'=> $request->input('datetest'),
    'prof_id'=> $request->input('prof_id'),
    'catego_id'=> $request->input('catego_id'),
    'number'=> $request->input('number'),
    'apprenant_id'=> $request->input('apprenant_id'),
    'course_id'=> $request->input('course_id'),

    ]);
    $groupeId = $groupes->id;
    $apprenantId = $request->input('apprenant_id');

    DB::table('apprenant_course')
        ->where('apprenant_id', $apprenantId)
        ->where('status', 'accepted')
        ->update(['groupe_id' => $groupeId]);
     return redirect()->route('admin.group.index')->with('success', '<<جوك باهي>> The Apprenant has been updated successfully.');
}

    public function addcourses(Request $request, Groupe $groupes)
    {
 $data = $request->validate([
     'course_id' => [
         'required',
         function($attribute, $value, $fail) use ($request, $groupes) {
             $count = $groupes->where('name', $request->input('name'))
                              ->where('course_id', $value)
                              ->count();
             if ($count > 0) {
                 $fail('The selected course already exists in this group.');
             }
         }
     ]
     // add other validation rules for other attributes as needed
 ]);

 Groupe::create
 ([ 'name'=> $request->input('name'),
 'datedeb'=> $request->input('datedeb'),
 'datefin'=> $request->input('datefin'),
 'datetest'=> $request->input('datetest'),
 'prof_id'=> $request->input('prof_id'),
 'catego_id'=> $request->input('catego_id'),
 'number'=> $request->input('number'),
 'apprenant_id'=> $request->input('apprenant_id'),
 'course_id'=> $request->input('course_id'),

 ]);

return redirect()->route('admin.group.index')->with('success', '<<جوك باهي>> The professeur has been updated successfully.');
}


public function delete(Request $request) {
    $name = $request->input('name');
    $groups = Groupe::where('name', $name)->get();

    foreach ($groups as $group) {
        $group->delete();
    }

    return redirect()->route('admin.group.index')->with('success', 'All groups with the name "' . $name . '" have been successfully deleted.');
}



       public function show($id)
       {
           $data['groupes'] = Groupe::findOrFail($id);
           $groupe = Groupe::find($id);
           $course_id = $groupe->course_id;
           $apprenant_id = $groupe->apprenant_id;
           $catego_id = $groupe->catego_id;
           $prof_id = $groupe->prof_id;
           $groupname = $groupe->name;
           $groupIds = Groupe::where('name', $groupname)->pluck('id')->toArray();

           $catego = Catego::find($catego_id);
           $categos = $catego->name;
           $cour = Course::find($course_id);
           $cours = $cour->id;
           $profs = Prof::find($prof_id);
           $profss = $profs->id;
           $appre = User::find($apprenant_id);
           $appren = $appre->id;

           $apprenants = [];
           foreach ($groupIds as $apprenat_id) {
               $apprenantsInGroup = \DB::table('users')
                   ->join('groupes', function($join) use ($apprenat_id, $groupname) {
                       $join->on('users.id', '=', 'groupes.apprenant_id')
                           ->where('groupes.name', '=', $groupname)
                           ->where('groupes.id', '=', $apprenat_id);
                   })
                   ->pluck('users.name')
                   ->toArray();
               if ($apprenantsInGroup) {
                   $apprenants = array_merge($apprenants, $apprenantsInGroup);
               }
           }
           $apprenants = array_unique($apprenants);
           $profs = [];
           foreach ($groupIds as $prof_id) {
               $profsInGroup = \DB::table('profs')
                   ->join('groupes', function($join) use ($prof_id, $groupname) {
                       $join->on('profs.id', '=', 'groupes.prof_id')
                           ->where('groupes.name', '=', $groupname)
                           ->where('groupes.id', '=', $prof_id);
                   })
                   ->pluck('profs.name')
                   ->toArray();
               if ($profsInGroup) {
                   $profs = array_merge($profs, $profsInGroup);
               }
           }
           $profs = array_unique($profs);

           $courses = [];
           foreach ($groupIds as $course_id) {
               $coursesInGroup = \DB::table('courses')
                   ->join('groupes', function($join) use ($course_id, $groupname) {
                       $join->on('courses.id', '=', 'groupes.course_id')
                           ->where('groupes.name', '=', $groupname)
                           ->where('groupes.id', '=', $course_id);
                   })
                ->pluck('courses.name')
                ->toArray();
               if ($coursesInGroup) {
                   $courses = array_merge($courses, $coursesInGroup);
               }
           }
           $courses = array_unique($courses);


           return view('admin.group.show', compact('profs', 'courses', 'categos', 'apprenants','profss','appren','cours'))->with($data);
       }

       public function deletee($id)
       {
        Group::findOrFail($id)->delete();
           return redirect()->route('admin.group.index')->with('success', 'The Groupe has been successfully deleted.');
       }

    }
