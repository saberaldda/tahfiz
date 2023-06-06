<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityOption>
 */
class ActivityOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_id'   => function () {return Activity::inRandomOrder()->first()->id;},
            'name'          => $this->faker->word,
            'points'        => $this->faker->numberBetween(1, 10),
        ];
    }
}
