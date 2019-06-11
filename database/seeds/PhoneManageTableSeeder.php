<?php

use Illuminate\Database\Seeder;

class PhoneManageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\AdminModel\Phonemanage',50)->create([

        ]);
    }
}
