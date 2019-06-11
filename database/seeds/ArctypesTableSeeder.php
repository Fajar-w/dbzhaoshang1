<?php

use Illuminate\Database\Seeder;

class ArctypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\AdminModel\Arctype',50)->create([
            //'password' => bcrypt('123456')
        ]);
    }
}
