<?php

use Illuminate\Database\Seeder;

class AddonarticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\AdminModel\Addonarticle',500)->create([
            //'password' => bcrypt('123456')
        ]);
    }
}
