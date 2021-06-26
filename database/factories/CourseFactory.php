<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(),
            'description' => $this->faker->text(),
            'content' => $this->faker->text(),
            'price' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'discount' => $this->faker->numberBetween($min = 0, $max = 99),
            'thumbnail' => $this->faker->imageUrl(),
            'category_id' => 1,

        ];
    }
}
