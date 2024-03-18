<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Permissionlar  yaratish

        Permission::create(['name' => 'manage companies', 'guard_name' =>'api']);
        Permission::create(['name' => 'manage employees', 'guard_name' => 'api']);
        Permission::create(['name' => 'edit own company', 'guard_name' => 'api']);

        // Rol yaratish va ruxsatlar tayinlash


        $roleAdmin = Role::create(['name' => 'admin', 'guard_name' => 'api']);
        $roleCompany = Role::create(['name' => 'company', 'guard_name' => 'api']);


        $roleAdmin->givePermissionTo(['manage companies', 'manage employees']);
        $roleCompany->givePermissionTo(['manage employees', 'edit own company']);



        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            EmployeesSeeder::class,
        ]);
    }
}
