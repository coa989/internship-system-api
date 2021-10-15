<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(15)
            ->create();

        foreach ($users as $user) {
            $user->roles()->attach(Role::inRandomOrder()->first()->id);
        }
    }
}
