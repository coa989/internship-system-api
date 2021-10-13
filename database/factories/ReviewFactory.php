<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\Intern;
use App\Models\Mentor;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pros' => $this->faker->sentences(5),
            'cons' => $this->faker->sentences(5),
            'assignment_id' => Assignment::factory(),
            'mentor_id' => Mentor::factory(),
            'intern_id' => Intern::factory()
        ];
    }
}
