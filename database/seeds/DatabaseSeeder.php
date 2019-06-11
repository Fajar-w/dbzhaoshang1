<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //DB::table('arctypes')->truncate();
        //DB::table('archives')->truncate();
        //DB::table('addonarticles')->truncate();
        //DB::table('flinks')->truncate();
        //$this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        //$this->call(PhoneManageTableSeeder::class);
        //$this->call(ArctypesTableSeeder::class);
        //$this->call(ArchivesTableSeeder::class);
        //$this->call(AddonarticlesTableSeeder::class);
        //$this->call(FlinksTableSeeder::class);
    }
}
