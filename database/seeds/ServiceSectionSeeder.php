<?php

use Illuminate\Database\Seeder;

class ServiceSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_sections')->insert([
            [
                'name' => 'اعداد رسائل الماجستير',
                'description' => ' ',
                'image' => 'default.png',
                'class'=>'',
                'icon'=>'fa fa-book',
                'active'=>'1',
                'created_by'=>'1'
            ]
            ,
            [
                'name' => 'مشاريع التخرج',
                'description' => ' ',
                'image' => 'default.png',
                'class'=>'',
                'icon'=>'fa fa-graduation-cap',
                'active'=>'1',
                'created_by'=>'1'
            ]
            ,
            [
                'name' => 'الترجمة المعتمدة',
                'description' => ' ',
                'image' => 'default.png',
                'class'=>'',
                'icon'=>'fa fa-exchange',
                'active'=>'1',
                'created_by'=>'1'
            ]
            ,
            [
                'name' => 'الدعايا والإعلان',
                'description' => ' ',
                'image' => 'default.png',
                'class'=>'',
                'icon'=>'fa fa-microphone',
                'active'=>'1',
                'created_by'=>'1'
            ]
            ,
            [
                'name' => 'الابحاث الجامعية',
                'description' => ' ',
                'image' => 'default.png',
                'class'=>'active-btn active-tab',
                'icon'=>'fa fa-graduation-cap',
                'active'=>'1',
                'created_by'=>'1'
            ]]);        
             
    }
}
