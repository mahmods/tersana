<?php

use Illuminate\Database\Seeder;

class SideBarMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sidebar_menus')->insert([
            [
                'name' => 'users',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
            [
                'name' => 'settings',
                'roles_access' => '1',
                'icon' => 'fa fa-sitemap',
                'ordering' => '7',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
            [
                'name' => 'pages',
                'roles_access' => '1',
                'icon' => 'icon-layers',
                'ordering' => '2',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
             [
                'name' => 'services',
                'roles_access' => '1',
                'icon' => 'fa fa-cubes',
                'ordering' => '3',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
             [
                'name' => 'servicesSections',
                'roles_access' => '1',
                'icon' => 'fa fa-circle-o',
                'ordering' => '4',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
             [
                'name' => 'clients',
                'roles_access' => '1',
                'icon' => 'fa fa-group',
                'ordering' => '5',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
             [
                'name' => 'blogs',
                'roles_access' => '1',
                'icon' => 'fa fa-pencil',
                'ordering' => '6',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
             [
                'name' => 'blog_categories',
                'roles_access' => '1',
                'icon' => 'fa fa-sitemap',
                'ordering' => '7',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
            [
                'name' => 'sliders',
                'roles_access' => '1',
                'icon' => 'fa fa-sitemap',
                'ordering' => '7',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
            [
                'name' => 'links',
                'roles_access' => '1',
                'icon' => 'fa fa-sitemap',
                'ordering' => '7',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
            [
                'name' => 'messages',
                'roles_access' => '1',
                'icon' => 'fa fa-sitemap',
                'ordering' => '7',
                'active' => '1',
                'have_header' => '1',
            ],
            


        ]);
    }
}
