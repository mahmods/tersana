@extends('front.layouts.front_layout')
@section('content')
<section class="page-banner" style="background-image:url('{{ASSETS}}/images/background/cover3.jpeg');">
	<div  class="auto-container text-center">
		<h1>{{$page->title}}</h1>
		<ul class="bread-crumb">
			<li><a href="{{route('getFrontHome')}}">HOME</a></li>
		    <li>{{$page->title}}</li>
		</ul>
	</div>
</section>
<section class="about-us-area">
	<!--About Upper-->
	<div class="about-upper text-center">
		<div class="auto-container">
			<div class="sec-title wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1000ms">
			<h2> <span>{{$page->title}}</span></h2>
			</div>
			<figure class="image wow zoomIn" data-wow-delay="300ms" data-wow-duration="1000ms"><img src="{{ASSETS}}/images/pages/{{$page->image}}" alt=""></figure>			
		</div>
	</div>
	<!--About Lower-->
	<div dir="rtl" class="about-lower">
		<div class="auto-container">
			<div class="row clearfix">
				<p style="font-family: NeoSans !important;">{!! html_entity_decode($page->description)!!}</p>						
			</div>
		</div>
	</div><!--About Lower End-->
</section>
@endsection