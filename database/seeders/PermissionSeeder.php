<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'can_create_user',
            'can_update_user',
            'can_show_user',
            'can_delete_user',
            'can_create_company',
            'can_update_company',
            'can_show_company',
            'can_delete_company'
        ];

        foreach ($names as $name) {
            Permission::firstOrCreate([
                'name' => $name
            ]);
        }
    }
}
