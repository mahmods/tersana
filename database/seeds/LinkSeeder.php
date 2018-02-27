<?php

use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('link_sections')->insert([
            [
                'link_section_id' => '1',
                'name' => 'navbar',
            ]
            ,
            [
                'link_section_id' => '2',
                'name' => 'footer',
            ]
        ]);


        DB::table('links')->insert([
            [
                'link_section_id' => '1',
                'title' => 'home',
                'route' => 'getFrontHome',
                'active'=>'1'
            ]
            ,
            [
                'link_section_id' => '1',
                'title' => 'services',
                'route' => 'getFrontServices',
                'active'=>'1'
            ]
            ,
            [
                'link_section_id' => '1',
                'title' => 'blog',
                'route' => 'getFrontBlog',
                'active'=>'1'
            ]
            ,
            [
                'link_section_id' => '1',
                'title' => 'clients',
                'route' => 'getFrontClients',
                'active'=>'1'
            ]
            ,
            [
                'link_section_id' => '1',
                'title' => 'photos',
                'route' => 'getFrontPhotos',
                'active'=>'1'
            ]
            ,[
                'link_section_id' => '1',
                'title' => 'contacts',
                'route' => 'getContacts',
                'active'=>'1'
            ]
            ,
            
        ]);
    }
}
