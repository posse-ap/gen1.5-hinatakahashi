<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //データのクリア
    DB::table('languages')->truncate();
    $param =[
        [
            'study_language'=>'JavaScript',
            'language_color'=>'1754ef'
        ],
        [
            'study_language'=>'CSS',
            'language_color'=>'2171bd'
        ],
        [
            'study_language'=>'PHP',
            'language_color'=>'4dbdde'
        ],
        [
            'study_language'=>'HTML',
            'language_color'=>'54cef9'
        ],
        [
            'study_language'=>'Laravel',
            'language_color'=>'b29ef3'
        ],
        [
            'study_language'=>'SQL',
            'language_color'=>'6d46ec'
        ],
        [
            'study_language'=>'SHELL',
            'language_color'=>'4f45ef'
        ],
        [
            'study_language'=>'情報システム基礎知識(その他)',
            'language_color'=>'3636c1'
        ]
        
    ];
    DB::table('languages')->insert($param);
    }
}
