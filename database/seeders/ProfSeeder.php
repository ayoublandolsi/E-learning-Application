<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prof;

class ProfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prof::create([
            'name'=>'nour homsi',
            'spec'=>'Graphic Design',
            'phone'=>'50444128',
            'img'=>'2.jpg'
        ]);
        Prof::create([
            'name'=>'ahmed lajmi',
            'spec'=>'Web Design',
            'phone'=>'50444128',
            'img'=>'1.jpg'
        ]);
        Prof::create([
            'name'=>'Kamel landolsi',
            'spec'=>'Online Marketing',
            'phone'=>'29904128',
            'img'=>'3.jpg'
        ]);
        Prof::create([
            'name'=>'Marwane ben torkia',
            'spec'=>'Video Editing',
            'phone'=>'20283848',
            'img'=>'4.jpg'
        ]);
    }
}
