<?php

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            ['name' => 'change-role'],
            ['name' => 'create-groups'],
            ['name' => 'edit-groups'],
            ['name' => 'delete-groups'],
            ['name' => 'create-mentors'],
            ['name' => 'edit-mentors'],
            ['name' => 'delete-mentors'],
            ['name' => 'create-interns'],
            ['name' => 'edit-interns'],
            ['name' => 'delete-interns'],
            ['name' => 'create-assignments'],
            ['name' => 'edit-assignments'],
            ['name' => 'delete-assignments'],
            ['name' => 'create-reviews'],
            ['name' => 'edit-reviews'],
            ['name' => 'delete-reviews'],
        ];
    }
}
