<?php

namespace Database\Seeders;

use App\Models\EmergencyResponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencyResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmergencyResponse::factory(15)->create();
    }
}
