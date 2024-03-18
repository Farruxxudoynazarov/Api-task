<?php

namespace Database\Seeders;

use App\Models\Company; // Company modelini chaqiramiz
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory(5)->create();
    }
}