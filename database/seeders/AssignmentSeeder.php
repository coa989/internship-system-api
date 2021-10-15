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
        $assignments = Assignment::factory(15)
            ->create();

        foreach ($assignments as $assignment) {
            $assignment->groups()->attach(Group::inRandomOrder()->first()->id);
        }
    }
}
