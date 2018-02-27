<?php

use Illuminate\Database\Seeder;

class SideBarItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sidebar_items')->insert([
            [
                'menu_id' => '1',
                'name' => 'allUsers',
                'route' => 'getAllUsers',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '1',
                'name' => 'addUser',
                'route' => 'getAddUser',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '2',
                'name' => 'all_settings',
                'route' => 'getAllSettings',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '3',
                'name' => 'pages',
                'route' => 'getAllPages',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '3',
                'name' => 'addPage',
                'route' => 'getAddPage',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '4',
                'name' => 'allServices',
                'route' => 'getAllServices',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,

            [
                'menu_id' => '4',
                'name' => 'addService',
                'route' => 'getAddService',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '5',
                'name' => 'addSection',
                'route' => 'getAddServiceSection',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '5',
                'name' => 'allSections',
                'route' => 'getAllServiceSections',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '6',
                'name' => 'allClients',
                'route' => 'getAllClients',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '6',
                'name' => 'addClient',
                'route' => 'getAddClient',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '7',
                'name' => 'all_blogs',
                'route' => 'getAllBlogs',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '7',
                'name' => 'add_blog',
                'route' => 'getAddBlog',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '2',
                'active' => '1',
            ],
            [
                'menu_id' => '8',
                'name' => 'all_blog_categories',
                'route' => 'getAllBlogCategories',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '8',
                'name' => 'add_blog_category',
                'route' => 'getAddBlogCategory',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '2',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '9',
                'name' => 'all_sliders',
                'route' => 'getAllSliders',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '9',
                'name' => 'add_slider',
                'route' => 'getAddSlider',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '2',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '10',
                'name' => 'all_links',
                'route' => 'getAllLinks',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '10',
                'name' => 'add_link',
                'route' => 'getAddLink',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '2',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '11',
                'name' => 'all_contacts',
                'route' => 'getAllContacts',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '2',
                'active' => '1',
            ]
        ]);
    }
}
