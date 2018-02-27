<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{!! \App\Repositories\SettingRepository::getSettingValue('site_title') !!}</title>
<!-- Stylesheets -->
@include('front.includes.css')
<!-- Responsive -->
@yield('css')
@include('front.includes.meta')
</head>

<body>
<h1 style="text-align: center;margin-top: 200px;">Front End Here ! </h1>
<h1 style="text-align: center;">add /login to access backend !</h1>
@include('front.includes.js')
{!! \App\Repositories\SettingRepository::getSettingValue('body_code') !!}
@include('front.includes.message')
</body>
</html>
