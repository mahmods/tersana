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
        $this->call(UserRolesSeeder::class);        
        $this->call(UserSeeder::class);
        $this->call(SideBarMenusSeeder::class);
        $this->call(SideBarItemsSeeder::class);
        $this->call(LinkSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ServiceSectionSeeder::class);
    }
}
