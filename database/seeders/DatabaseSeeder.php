<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\ActivityOption;
use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'  => 'saber',
            'email' => 'saber@tds.com',
        ]);
        $this->command->info("\n" . '.... Seeding SABER completed successfully!');

        User::factory(5)->create();
        $this->command->info("\n" . '.... Seeding USERS completed successfully!');

        Activity::factory()->createMany([
            ['name'  => 'الفجر'],
            ['name'  => 'الظهر'],
            ['name'  => 'العصر'],
            ['name'  => 'المغرب'],
            ['name'  => 'العشاء'],
            ['name'  => 'الحضور'],
            ['name'  => 'التسميع'],
            ['name'  => 'جلسة الخميس'],
            ['name'  => 'جلسة العشاء'],
            ['name'  => 'تسميع اكثر من صفحة'],
        ]);
        $this->command->info("\n" . '.... Seeding ACTIVITIES completed successfully!');

        ActivityOption::factory()->createMany([
            ['activity_id'  => 1, 'name' => 'صلى', 'points' => 10],
            ['activity_id'  => 1, 'name' => 'لم يصلي', 'points' => 0],

            ['activity_id'  => 2, 'name' => 'صلى', 'points' => 10],
            ['activity_id'  => 2, 'name' => 'لم يصلي', 'points' => 0],

            ['activity_id'  => 3, 'name' => 'صلى', 'points' => 10],
            ['activity_id'  => 3, 'name' => 'لم يصلي', 'points' => 0],

            ['activity_id'  => 4, 'name' => 'صلى', 'points' => 10],
            ['activity_id'  => 4, 'name' => 'لم يصلي', 'points' => 0],

            ['activity_id'  => 5, 'name' => 'صلى', 'points' => 10],
            ['activity_id'  => 5, 'name' => 'لم يصلي', 'points' => 0],
            
            ['activity_id'  => 6, 'name' => 'حاضر', 'points' => 5],
            ['activity_id'  => 6, 'name' => 'غائب', 'points' => -5],
            ['activity_id'  => 6, 'name' => 'مأذون', 'points' => 0],

            ['activity_id'  => 7, 'name' => 'جيد', 'points' => 1],
            ['activity_id'  => 7, 'name' => 'ممتاز', 'points' => 2],
            ['activity_id'  => 7, 'name' => 'متميز', 'points' => 3],
            
            ['activity_id'  => 8, 'name' => 'حاضر', 'points' => 7],
            ['activity_id'  => 8, 'name' => 'غائب', 'points' => 0],
            
            ['activity_id'  => 9, 'name' => 'حاضر', 'points' => 5],
            ['activity_id'  => 9, 'name' => 'غائب', 'points' => 0],

        ]);
        $this->command->info("\n" . '.... Seeding ACTIVITY_OPTIONS completed successfully!');

        for ($i = 0; $i < 100; $i++) {
            try {
                Point::factory(1)->create();
            } catch (\Throwable $th) {
            }
        }
        $this->command->info("\n" . '.... Seeding POINTS completed successfully!');

    }
}
