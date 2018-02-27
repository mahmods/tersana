@extends('front.layouts.front_layout')
@section('content')
<!-- Page Banner -->
    <section class="page-banner" style="background-image:url('{{ASSETS}}/images/background/cover3.jpeg');">
	<div  class="auto-container text-center">
		<h1>CONTACT US</h1>
		<ul class="bread-crumb">
            <li><a href="{{route('getFrontHome')}}">HOME</a></li>
			<li><a href="{{route('getContacts')}}">Contact Us</a></li>
			
		</ul>
	</div>
	</section>

    <!--Info Strip-->
    <section class="info-strip">
        <div class="auto-container">
            <div class="row clearfix">
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="info-block text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">
                        <div class="icon hvr-radial-out"><span class="f-icon flaticon-pointing8"></span></div>
                        <h4>ADDRESS</h4>
                        <p dir="rtl">{!! \App\Repositories\SettingRepository::getSettingValue('address') !!}</p>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="info-block text-center wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                        <div class="icon hvr-radial-out"><span class="f-icon flaticon-email103"></span></div>
                        <h4>E-MAIL</h4>
                        <p><a href="mailto:{!! \App\Repositories\SettingRepository::getSettingValue('info_email') !!}">{!! \App\Repositories\SettingRepository::getSettingValue('info_email') !!}</a></p>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="info-block text-center wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">
                        <div class="icon hvr-radial-out"><span class="f-icon flaticon-telephone46"></span></div>
                        <h4>PHONE</h4>
                        <p>{!! \App\Repositories\SettingRepository::getSettingValue('phone') !!}</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <!--Contact Us Area-->
    <section class="contact-us-area">
        <div class="auto-container">
            <div class="row clearfix">
                
                 <!--Contact Form-->
                <div class="col-md-7 col-sm-6 col-xs-12 contact-form wow fadeInLeft"  title="LEAVE A MESSAGE" data-wow-delay="0ms" data-wow-duration="1000ms">
                    <h2>LEAVE A MESSAGE</h2>
                    
                    <form  method="post" action="{{route('postAddContact')}}">
                        <div class="field-container clearfix">
                            {{csrf_field()}}
                            
                            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <input type="email" name="email" value="{{old('email')}}" placeholder="E-MAIL" required>
                                @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Full Name">
                                @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            
                            <div class="clearfix"></div>
                            
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="number" name="phone" value="{{old('phone')}}" placeholder="PHONE" required>
                                @if($errors->has('phone'))
                                <span class="help-block">{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="address" value="{{old('address')}}" placeholder="ADDRESS">
                                @if($errors->has('address'))
                                <span class="help-block">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <textarea name="message" placeholder="MESSAGE" required>{{old('message')}}</textarea>
                                @if($errors->has('message'))
                                <span class="help-block">{{$errors->first('message')}}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" name="submit-form" class="primary-btn hvr-bounce-to-left"><span class="btn-text">SEND MESSAGE</span> <strong class="icon"><span class="f-icon flaticon-letter110"></span></strong></button>
                            </div>
                            
                        </div>
                    </form>
                </div>
                 <!--Map Area-->
                <div class="col-md-5 col-sm-6 col-xs-12 map-area wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
                    <h2>FIND ON MAP</h2>
                    <!--
                    
                    <div class="our-location" id="map-location"></div>
                    -->
                   </iframe>
                </div>

           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.1224319342014!2d31.342789914245827!3d30.062024881875953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e7228cb188b%3A0x703d99e90c6fd3f9!2sMakram+Ebeid%2C+Al+Manteqah+as+Sadesah%2C+Nasr+City%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1513933434724" width="460" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            
            </div>
        </div>
    </section>
    
@endsection