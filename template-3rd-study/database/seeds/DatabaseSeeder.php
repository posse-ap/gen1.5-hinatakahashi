<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        StudyTableSeeder::class,
        LanguageTableSeeder::class,
        ContentTableSeeder::class,
        ]);
    }
}
