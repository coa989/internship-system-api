<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $recruiter = Role::create(['name' => 'recruiter']);
        $mentor = Role::create(['name' => 'mentor']);

        $permissions = [
            'change-role',
            'create-groups',
            'edit-groups',
            'delete-groups',
            'create-mentors',
            'edit-mentors',
            'delete-mentors',
            'create-interns',
            'edit-interns',
            'delete-inters',
            'create-assignment',
            'edit-assignment',
            'delete-assignment',
            'create-reviews',
            'edit-reviews',
            'delete-reviews'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach (Permission::all() as $permission) {
            $admin->permissions()->attach($permission->id);
        }

        foreach (Permission::whereBetween('id', [2, 13])->get() as $permission) {
            $recruiter->permissions()->attach($permission->id);
        }

        foreach (Permission::whereBetween('id', [2, 4])->get() as $permission) {
            $mentor->permissions()->attach($permission->id);
        }

        foreach (Permission::whereBetween('id', [8, 16])->get() as $permission) {
            $mentor->permissions()->attach($permission->id);
        }
    }
}
