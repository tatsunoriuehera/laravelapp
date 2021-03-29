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
        // $this->call(UserSeeder::class);
        //call peopletableseeder
        //$this->call(PeopleTableSeeder::class);

        //call RestdataTableSeeder
        $this->call(RestdataTableSeeder::class);
    }
}
