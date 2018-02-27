<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title' => 'من نحن',
                'image' => 'aboutus.jpg',
                'description' => '<p dir="rtl"><span style="color:#299fc0"><span style="font-size:24px"><span style="font-family:NeoSans"><span style="font-family:NeoSans"><strong>من نحن </strong></span></span></span></span></p>

					<p dir="rtl"><span style="font-family:NeoSans"><span style="font-family:NeoSans"><span style="font-size:large">أمتياز هو أول وأكبر موقع للخدمات الطلابية المتنوعة حيث نقوم بإعداد رسائل الماجستير بكافة تفاصيلها وبإحترافية عالية </span></span></span><span style="font-family:Sakkal Majalla,serif"><span style="font-size:large">, </span></span><span style="font-family:Arial"><span style="font-family:NeoSans"><span style="font-size:large">ويستهدف إمتياز الطلاب والخريجين والباحثين فى الجامعات العربية والأجنبية من خلال التعاون مع نخبة متميزة من حملة شهادة الماجستير والدكتوراة فى التخصصات المختلفة</span></span></span><span style="font-family:NeoSans"><span style="font-size:large">.</span></span></p>

					<p dir="rtl">&nbsp;</p>

					<p dir="rtl"><span style="font-size:24px"><span style="color:#299fc0"><span style="font-family:Arial"><span style="font-family:NeoSans"><strong>رسالتنا</strong></span></span></span></span><span style="color:#16a085"><span style="font-family:NeoSans"><span style="font-family:NeoSans"><span style="font-size:large"><strong>&nbsp;</strong></span></span></span></span></p>

					<p dir="rtl"><span style="font-family:NeoSans"><span style="font-family:NeoSans"><span style="font-size:large">تسعى دائما إمتياز لتقديم خدمات للطلاب والباحثين ورجال الأعمال بجودة وحرفية عالية فى مجال إعداد رسائل الماجستير والأبحاث الجامعية فى كافة التخصصات وذلك من خلال نخبة متميزة من الأساتذة والمتخصصين فى مجالات الإستشارات الطلابية </span></span></span><span style="font-family:NeoSans"><span style="font-size:large">.</span></span></p>

					<p dir="rtl">&nbsp;</p>

					<p dir="rtl"><span style="font-size:24px"><span style="color:#299fc0"><span style="font-family:NeoSans"><span style="font-family:NeoSans"><strong>رؤيتنا</strong></span></span></span></span></p>

					<p dir="rtl"><span style="font-family:NeoSans"><span style="font-family:NeoSans"><span style="font-size:large">أن نكون أكبر كيان متخصص بالشرق الأوسط فى مجال رسائل الماجستير والأبحاث الجامعية</span></span></span><span style="font-family:NeoSans"><span style="font-size:large">.</span></span><br />
					&nbsp;</p>

					<p dir="rtl"><span style="font-size:24px"><strong><span dir="rtl"><span style="color:#299fc0"><span style="font-family:NeoSans"><span style="font-family:NeoSans">وسائل الدفع المتاحة</span></span></span></span></strong></span></p>

					<p dir="rtl"><span style="font-family:NeoSans"><span style="font-family:NeoSans"><span style="font-size:large">التحويل البنكى </span></span></span><span style="font-family:NeoSans"><span style="font-size:large">- </span></span><span style="font-family:NeoSans"><span style="font-family:NeoSans"><span style="font-size:large">ويسترن يونيون </span></span></span><span style="font-family:NeoSans"><span style="font-size:large">- PayPal</span></span></p>

					<p dir="rtl"><br />
					&nbsp;</p>
					',
                'active' => '1'
            ]
           


        ]);
    }
}
