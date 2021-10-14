<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Group;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assignment::factory(10)
            ->create();
    }
}
