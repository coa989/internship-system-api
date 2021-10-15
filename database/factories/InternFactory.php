<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Intern;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Intern::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'cv' => $this->faker->url,
            'github' => $this->faker->url,
            'group_id' => Group::inRandomOrder()->first()->id
        ];
    }
}
