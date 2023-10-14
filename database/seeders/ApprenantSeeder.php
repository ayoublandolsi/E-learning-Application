<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apprenant;
use Database\Factories\ApprenantFactory;

class ApprenantSeeder extends Seeder
{
    public function run()
    {
        Apprenant::factory()->count(10)->create();
    }
}
