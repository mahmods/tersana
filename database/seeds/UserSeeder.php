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
            'role_id' => 1,
            'created_by' => 1,
            'active' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('6060660'),
        ]);
    }
}
