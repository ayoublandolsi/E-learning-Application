<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catego;

class CategoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catego::create(['name'=>'Web Design']);
        Catego::create(['name'=>'Graphic Design']);
        Catego::create(['name'=>'Video Editing']);
        Catego::create(['name'=>'Online Marketing']);
    }
}
