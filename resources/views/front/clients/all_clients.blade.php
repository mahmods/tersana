@extends('front.layouts.front_layout')
@section('content')
<!-- Page Banner -->
    <section class="page-banner" style="background-image:url('{{ASSETS}}/images/background/cover3.jpeg');">
	<div  class="auto-container text-center">
		<h1>CLIENTS</h1>
		<ul class="bread-crumb">
            <li><a href="{{route('getFrontHome')}}">HOME</a></li>
			<li><a href="{{route('getFrontHome')}}">Clients</a></li>
		</ul>
	</div>
	</section>
    
    <!--Our Projects-->
    <section  class="our-projects with-margin">
        <div class="auto-container">
            
            <div class="sec-title wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1000mproject-boxs">
                <h2>OUR <span>CLIENTS</span></h2>
            </div>
                
            <div class="sec-text wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                <p></p>
            </div>
        </div>
        
        <!--Projects Container-->
        <div class="projects-container filter-list clearfix wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
        @foreach($clients as $i=>$client)    
            <article title="{{$client->other}}" class="project-box mix mix_all mall architecture">
                <figure class="image"><img src="{{ASSETS}}/images/clients/{{$client->logo}}" alt=""><a href="{{ASSETS}}/images/clients/{{$client->logo}}" class="lightbox-image zoom-icon"></a></figure>
                <div class="text">
                    <div class="text-clients">
                        <h4 style="text-align: center;"><a target="_blank" style="color: #999;margin:5px;" href="{{$client->external_link}}">{{$client->name}}</a></h4>
                    </div>
                </div>
            </article>
        @endforeach     
        </div>
    </section>
@endsection