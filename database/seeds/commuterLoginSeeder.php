<?php

use Illuminate\Database\Seeder;

class commuterLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('commutters')->truncate();
        DB::table('commutters')->insert([
            'name' => 'Demo',
            'email' => 'admin@demo.com',
            'address' => 'salem',
            'mobile' => '1234567890',
            'password' => bcrypt('123456'),
           
        ]);
        DB::table('hubs')->insert([
            'name' => 'Demo',
            'email' => 'admin@demo.com',
            'address' => 'salem',
            'mobile' => '1234567890',
            'password' => bcrypt('123456'),
        ]);
    }
}
