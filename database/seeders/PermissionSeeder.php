<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'change-role']);
        Permission::create(['name' => 'create-groups']);
        Permission::create(['name' => 'edit-groups']);
        Permission::create(['name' => 'delete-groups']);
        Permission::create(['name' => 'create-mentors']);
        Permission::create(['name' => 'edit-mentors']);
        Permission::create(['name' => 'delete-mentors']);
        Permission::create(['name' => 'create-interns']);
        Permission::create(['name' => 'edit-interns']);
        Permission::create(['name' => 'delete-interns']);
        Permission::create(['name' => 'create-assignments']);
        Permission::create(['name' => 'edit-assignments']);
        Permission::create(['name' => 'delete-assignments']);
        Permission::create(['name' => 'create-reviews']);
        Permission::create(['name' => 'edit-reviews']);
        Permission::create(['name' => 'delete-reviews']);
    }
}
