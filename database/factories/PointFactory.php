<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\ActivityOption;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'               => function () {return User::inRandomOrder()->first()->id;},
            'activity_id'           => function () {return Activity::inRandomOrder()->first()->id;},
            'activity_option_id'    => function () {return ActivityOption::inRandomOrder()->first()->id;},
            'date'                  => $this->faker->dateTimeBetween('-5 days', 'now'),
        ];
    }
}
