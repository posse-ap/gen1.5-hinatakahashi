<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudyHoursPost;

class StudyHoursPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudyHoursPost::truncate();

        StudyHoursPost::create([
            'user_id' => 2,
            'total_hour' => 2.5,
            'study_date' => '2020-01-01',
        ]);

        StudyHoursPost::create([
            'user_id' => 1,
            'total_hour' => 4,
            'study_date' => '2020-02-02',
        ]);

        StudyHoursPost::create([
            'user_id' => 2,
            'total_hour' => 0.5,
            'study_date' => '2020-03-03',
        ]);
    }
}
