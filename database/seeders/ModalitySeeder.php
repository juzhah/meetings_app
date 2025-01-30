<?php

namespace Database\Seeders;

use App\Models\Modality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modality::insert([
            ['name' => 'VIRTUAL'],
            ['name' => 'ONSITE'],
            ['name' => 'HYBRID'],
        ]);
    }
}
