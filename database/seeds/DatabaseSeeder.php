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
        //$this->call(Republic_TableSeeder::class);
        // $this->call(Comment_TableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RepublicTableSeeder::class);
    }
}
