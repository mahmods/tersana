<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ahmed Abd Elgayed',
            'email' => 'pm@emtyiaz.com',
            //'password' => bcrypt(''),
            'password' => '$2y$10$ROENtqemITOx09ugzSWYFe7r4yFH9CwxukCACVp5ykPs2F1GRvS2u',
        ]);
    }
}
