<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apprenant;
use Illuminate\Support\Facades\DB;

class CoursesStudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <=10 ; $i++) {



        DB::table('apprenant_course')->insert([
            'course_id'=>rand(1,24),
            'apprenant_id'=>rand(1,9),
            'courstatus'=>'ongoing',
            'created_at'=>now(),
            'updated_at'=>now(),


        ]);
    }
    }
}
