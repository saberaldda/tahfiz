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
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'activity_id' => function () {
                $activity = Activity::inRandomOrder()->first();
                return $activity->id;
            },
            'activity_option_id' => function (array $attributes) {
                $activityId = $attributes['activity_id'];
                return ActivityOption::where('activity_id', $activityId)->inRandomOrder()->first()->id;
            },
            'date' => $this->faker->dateTimeBetween('-5 days', 'now'),
        ];
    }
}
