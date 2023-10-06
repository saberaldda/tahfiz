<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\ActivityOption;
use App\Models\Point;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Setting::factory()->createMany([
            ['key' => 'APP_NAME', 'value' => 'Tahfiz'],
            ['key' => 'POINTS_DATE', 'value' => '2023-06-16'],
        ]);
        $this->command->info("\n" . '.... Seeding SETTINGS completed successfully!');

        User::factory()->create([
            'name'  => 'saber',
            'email' => 'saber@tds.com',
            'type'  => 'admin',
        ]);
        User::factory()->create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'type'      => 'admin',
        ]);
        $this->command->info("\n" . '.... Seeding SABER completed successfully!');

        User::factory()->createMany([
            ['name'  => 'انس خليل أبو صبحة', 'type' => 'student'],
            ['name'  => 'ايمن توفيق أبو دقه', 'type' => 'student'],
            ['name'  => 'أسامة خليل أبو صبحة', 'type' => 'student'],
            ['name'  => 'أسامة شادي قديح', 'type' => 'student'],
            ['name'  => 'حمزة احمد أبو دقه', 'type' => 'student'],
            ['name'  => 'خليل احمد أبو ظريفة', 'type' => 'student'],
            ['name'  => 'عبد الباري توفيق أبو دقه', 'type' => 'student'],
            ['name'  => 'محمد احمد أبو ظريفة', 'type' => 'student'],
            ['name'  => 'محمود حمزة قديح', 'type' => 'student'],
            ['name'  => 'ياسين شادي قديح', 'type' => 'student'],
            ['name'  => 'يوسف عبدالله أبو عليان', 'type' => 'student'],
            ['name'  => 'محمد إسماعيل أبو دقه', 'type' => 'student'],
            ['name'  => 'معتصم بالله حسن أبو عليان', 'type' => 'student'],
            ['name'  => 'محمد جبريل أبو دقه', 'type' => 'student'],
            ['name'  => 'براء شادي قديح', 'type' => 'student'],
            ['name'  => 'محمد عبد الله أبو دقه', 'type' => 'student'],
            ['name'  => 'اسيد محمود أبو دقه', 'type' => 'student'],
            ['name'  => 'زياد رامز النجار', 'type' => 'student'],
            ['name'  => 'لوئ خليل أبو صبحة', 'type' => 'student'],
            ['name'  => 'عبد الرحمن عبدالله أبو دقه', 'type' => 'student'],
            ['name'  => 'قصي اكرم أبو دقه', 'type' => 'student'],
            ['name'  => 'اكرم احمد أبو عليان', 'type' => 'student'],
            ['name'  => 'محمد إبراهيم أبو عليان', 'type' => 'student'],
            ['name'  => 'قيس حسن أبو عليان', 'type' => 'student'],
            ['name'  => 'براء ياسر قديح', 'type' => 'student'],
            ['name'  => 'اويس ياسر قديح', 'type' => 'student'],
            ['name'  => 'محمد اكرم أبو عليان', 'type' => 'student'],
            ['name'  => 'أسامة احمد أبو دقه', 'type' => 'student'],
            ['name'  => 'ابراهبم هاني أبو دقه', 'type' => 'student'],
            ['name'  => 'يوسف وسام أبو دقه', 'type' => 'student'],
            ['name'  => 'محمد ساهر أبو دقه', 'type' => 'student'],
            ['name'  => 'عبد الرحمن صهيب أبو عليان', 'type' => 'student'],
            ['name'  => 'ايهم عبد ربه أبو عليان', 'type' => 'student'],
            ['name'  => 'احمد هاني قديح', 'type' => 'student'],
            ['name'  => 'فراس نائل قديح', 'type' => 'student'],
            ['name'  => 'محمد صلاح أبو دقه', 'type' => 'student'],
            ['name'  => 'إبراهيم مدحت أبو دقه', 'type' => 'student'],
            ['name'  => 'عبيده صهيب أبو عليان', 'type' => 'student'],
            ['name'  => 'فراس إسماعيل أبو دقه', 'type' => 'student'],
            ['name'  => 'عمر محمد أبو عليان', 'type' => 'student'],
            ['name'  => 'زياد طارق أبو دقه', 'type' => 'student'],
            ['name'  => 'رامز سالم قديح', 'type' => 'student'],
            ['name'  => 'رائد محمد أبو صبحة', 'type' => 'student'],
            ['name'  => 'محمود محمد أبو صبحة', 'type' => 'student'],
            ['name'  => 'يوسف عدي أبو عليان', 'type' => 'student'],
            ['name'  => 'ادم نبيل أبو دقه', 'type' => 'student'],
            ['name'  => 'عبدالله عمار قديح', 'type' => 'student'],
            ['name'  => 'يزن رامز النجار', 'type' => 'student'],
            ['name'  => 'عبداللطيف حسين قديح', 'type' => 'student'],
            ['name'  => 'مصعب إبراهيم أبو مصطفى', 'type' => 'student'],
            ['name'  => 'براء زهير المصري', 'type' => 'student'],
            ['name'  => 'شرف الدين زهير المصري', 'type' => 'student'],
            ['name'  => 'إبراهيم هيثم شراب ', 'type' => 'student'],
            // ['name'  => '', 'type' => 'student'],
        ]);
        $this->command->info("\n" . '.... Seeding USERS completed successfully!');

        Activity::factory()->createMany([
            ['name'  => 'الفجر'],
            ['name'  => 'الظهر'],
            ['name'  => 'العصر'],
            ['name'  => 'المغرب'],
            ['name'  => 'العشاء'],
            ['name'  => 'الحضور'],
            ['name'  => 'التسميع'],
            ['name'  => 'تسميع اكثر من صفحة'],
            ['name'  => 'رياض الصالحين'],
            ['name'  => 'جلسة الخميس'],
        ]);
        $this->command->info("\n" . '.... Seeding ACTIVITIES completed successfully!');

        ActivityOption::factory()->createMany([
            ['activity_id'  => 1, 'name' => 'صلى', 'points' => 10],
            ['activity_id'  => 1, 'name' => 'لم يصلي', 'points' => 0],

            ['activity_id'  => 2, 'name' => 'صلى', 'points' => 5],
            ['activity_id'  => 2, 'name' => 'لم يصلي', 'points' => 0],

            ['activity_id'  => 3, 'name' => 'صلى', 'points' => 5],
            ['activity_id'  => 3, 'name' => 'لم يصلي', 'points' => 0],

            ['activity_id'  => 4, 'name' => 'صلى', 'points' => 5],
            ['activity_id'  => 4, 'name' => 'لم يصلي', 'points' => 0],

            ['activity_id'  => 5, 'name' => 'صلى', 'points' => 5],
            ['activity_id'  => 5, 'name' => 'لم يصلي', 'points' => 0],
            
            ['activity_id'  => 6, 'name' => 'حاضر', 'points' => 5],
            ['activity_id'  => 6, 'name' => 'غائب', 'points' => -5],
            ['activity_id'  => 6, 'name' => 'مأذون', 'points' => 0],

            ['activity_id'  => 7, 'name' => 'لم يسمع', 'points' => 0],
            ['activity_id'  => 7, 'name' => 'جيد', 'points' => 1],
            ['activity_id'  => 7, 'name' => 'ممتاز', 'points' => 2],
            ['activity_id'  => 7, 'name' => 'متميز', 'points' => 3],

            ['activity_id'  => 8, 'name' => 'بدون زيادة', 'points' => 0],
            ['activity_id'  => 8, 'name' => 'زيادة', 'points' => 10],
            
            ['activity_id'  => 9, 'name' => 'حاضر', 'points' => 5],
            ['activity_id'  => 9, 'name' => 'غائب', 'points' => 0],
            
            ['activity_id'  => 10, 'name' => 'حاضر', 'points' => 7],
            ['activity_id'  => 10, 'name' => 'غائب', 'points' => 0],

        ]);
        $this->command->info("\n" . '.... Seeding ACTIVITY_OPTIONS completed successfully!');

        // for ($i = 0; $i < 100000; $i++) {
        //     try {
        //         Point::factory(1)->create();
        //     } catch (\Throwable $th) {
        //     }
        // }
        // $this->command->info("\n" . '.... Seeding POINTS completed successfully!');

    }
}
