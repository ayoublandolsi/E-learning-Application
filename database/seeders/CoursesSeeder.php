<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <=4 ; $i++) {
            for ($j=0; $j <=8 ; $j++) {
                Course::create([
                    'catego_id'=>$i,
                    'prof_id'=>rand(1,4),
                    'name'=>"course num $j catego num $i",
                    'smalldesc'=>"Web Design & Development Course for Beginners",
                    'desc'=>"Courses can be taken for credit, which means that they count towards a degree or certification program, or they can be taken for personal enrichment or professional development.",
                     'price'=> rand(100,200),
                     'duree'=> rand(2,30),
                     'img'=>"$i$j.jpg",
                ]);
            }
        }
    }
}

