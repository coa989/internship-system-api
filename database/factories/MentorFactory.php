<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;

class MentorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mentor::class;

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
            'skype' => $this->faker->md5,
            'group_id' => Group::inRandomOrder()->first()->id
        ];
    }
}
