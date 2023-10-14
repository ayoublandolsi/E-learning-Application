<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Groupe;
use App\Models\Apprenant;
use App\Models\Course;
use App\Models\Prof;
use App\Models\Catego;

class GroupeSeeder extends Seeder
{
    public function run()
    {
        // Retrieve existing records from the referenced tables
        $apprenants = Apprenant::pluck('id');
        $courses = Course::pluck('id');
        $profs = Prof::pluck('id');
        $categos = Catego::pluck('id');

        // Define the data to be inserted
        $groupes = [
            [
                'name' => 'Groupe A',
                'datedeb' => '2022-01-01',
                'datefin' => '2022-06-30',
                'datetest' => '2022-06-01',
                'apprenant_id' => $apprenants->random(),
                'course_id' => $courses->random(),
                'prof_id' => $profs->random(),
                'catego_id' => $categos->random(),
                'number' => 20,
            ],
            [
                'name' => 'Groupe B',
                'datedeb' => '2022-02-01',
                'datefin' => '2022-07-31',
                'datetest' => '2022-07-01',
                'apprenant_id' => $apprenants->random(),
                'course_id' => $courses->random(),
                'prof_id' => $profs->random(),
                'catego_id' => $categos->random(),
                'number' => 15,
            ],
            [
                'name' => 'Groupe C',
                'datedeb' => '2022-03-01',
                'datefin' => '2022-08-31',
                'datetest' => '2022-08-01',
                'apprenant_id' => $apprenants->random(),
                'course_id' => $courses->random(),
                'prof_id' => $profs->random(),
                'catego_id' => $categos->random(),
                'number' => 25,
            ],
        ];

        // Insert the data into the database
        Groupe::insert($groupes);
    }
}
