<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'site_title' => 'شركة إمتياز للخدمات الطلابية',
                'site_description' => 'أمتياز هو أول وأكبر موقع للخدمات الطلابية المتنوعة حيث نقوم بإعداد رسائل الماجستير بكافة تفاصيلها وبإحترافية عالية , ويستهدف إمتياز الطلاب والخريجين والباحثين فى الجامعات العربية والأجنبية من خلال التعاون مع نخبة متميزة من حملة شهادة الماجستير والدكتوراة فى التخصصات المختلفة.',
                'address' => 'عنوان الموقع',
                'phone' => '01114795',
                'sales_email' => 'sales@emtyiaz.com',
                'info_email' => 'info@emtyiaz.com',
                'facebook_link' => 'لينك فيسبوك',
                'twitter_link' => 'لينك تويتر',
                'linkedin_link' => 'لينك لينكد ان',
                'cashing_methods' => 'التحويل البنكى - ويسترن يونيون - PayPal',
            ]
           
        ]);
    }
}
