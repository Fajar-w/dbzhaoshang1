<?php

use Illuminate\Database\Seeder;

class FlinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\AdminModel\flink',50)->create([
           
        ]);
    }
}
