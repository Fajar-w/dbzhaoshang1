<?php

use Illuminate\Database\Seeder;

class ArchivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\AdminModel\Archive',500)->create([
            //'password' => bcrypt('123456')
        ]);
    }
}
