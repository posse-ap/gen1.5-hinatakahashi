<?php

use Illuminate\Database\Seeder;

class StudyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('studies')->truncate();
    $param =[
        [
            'study_date'=>'2022-04-03',
            'language_id'=>'1',
            'content_id'=>'3',
            'study_hour'=>'5'
        ],
        [
            'study_date'=>'2022-04-04',
            'language_id'=>'2',
            'content_id'=>'1',
            'study_hour'=>'10'
        ],
        [
            'study_date'=>'2022-04-05',
            'language_id'=>'3',
            'content_id'=>'3',
            'study_hour'=>'12'
        ],
        [
            'study_date'=>'2022-04-05',
            'language_id'=>'1',
            'content_id'=>'2',
            'study_hour'=>'20'
        ]
    ];
    DB::table('studies')->insert($param);
    }
}
