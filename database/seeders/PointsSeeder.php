<?php

namespace Database\Seeders;

use App\Models\Point;
use Illuminate\Database\Seeder;

class PointsSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 5000; $i++) {
            try {
                Point::factory(1)->create();
            } catch (\Throwable $th) {
            }
        }
        $this->command->info("\n" . '.... Seeding POINTS completed successfully!');
    }
}
