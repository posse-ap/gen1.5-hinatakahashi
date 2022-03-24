<?php

use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //データのクリア
    DB::table('contents')->truncate();
    $param =[
        [
            'study_content'=>'N予備校',
            'content_color'=>'1754ef'
        ],
        [
            'study_content'=>'ドットインストール',
            'content_color'=>'2171bd'
        ],
        [
            'study_content'=>'POSSE課題',
            'content_color'=>'4dbdde'
        ]
        
    ];
    DB::table('contents')->insert($param);
    }
}
