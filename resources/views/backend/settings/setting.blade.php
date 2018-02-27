@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>{{trans('link.update_link')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="{{route('updateSettingById',['settingId'=>$setting->setting_id])}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.site_title')}}</label>
                                <input name="site_title" value="{{$setting->site_title}}" type="text" class="form-control" placeholder="{{trans('setting.site_title')}}" >
                                @if($errors->has('site_title'))
                                <span class="help-block">{{$errors->first('site_title')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.site_description')}}</label>
                                <textarea name="site_description" class="form-control" placeholder="{{trans('setting.site_description')}}" >{{$setting->site_description}}</textarea>
                                @if($errors->has('site_description'))
                                <span class="help-block">{{$errors->first('site_description')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.address')}}</label>
                                <input name="address" value="{{$setting->address}}" type="text" class="form-control" placeholder="{{trans('setting.address')}}" >
                                @if($errors->has('address'))
                                <span class="help-block">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.phone')}}</label>
                                <input name="phone" value="{{$setting->phone}}" type="number" class="form-control" placeholder="{{trans('setting.phone')}}" >
                                @if($errors->has('phone'))
                                <span class="help-block">{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">whats'app</label>
                                <input name="whatsapp" value="{{$setting->whatsapp}}" type="number" class="form-control" placeholder="whats'app" >
                                @if($errors->has('whatsapp'))
                                <span class="help-block">{{$errors->first('whatsapp')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.sales_email')}}</label>
                                <input name="sales_email" value="{{$setting->sales_email}}" type="email" class="form-control" placeholder="{{trans('setting.sales_email')}}" >
                                @if($errors->has('sales_email'))
                                <span class="help-block">{{$errors->first('sales_email')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.info_email')}}</label>
                                <input name="info_email" value="{{$setting->info_email}}" type="text" class="form-control" placeholder="{{trans('setting.info_email')}}" >
                                @if($errors->has('info_email'))
                                <span class="help-block">{{$errors->first('info_email')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.facebook_link')}}</label>
                                <input name="facebook_link" value="{{$setting->facebook_link}}" type="text" class="form-control" placeholder="{{trans('setting.facebook_link')}}" >
                                @if($errors->has('facebook_link'))
                                <span class="help-block">{{$errors->first('facebook_link')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.twitter_link')}}</label>
                                <input name="twitter_link" value="{{$setting->twitter_link}}" type="text" class="form-control" placeholder="{{trans('setting.twitter_link')}}" >
                                @if($errors->has('twitter_link'))
                                <span class="help-block">{{$errors->first('twitter_link')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.linkedin_link')}}</label>
                                <input name="linkedin_link" value="{{$setting->linkedin_link}}" type="text" class="form-control" placeholder="{{trans('setting.linkedin_link')}}" >
                                @if($errors->has('linkedin_link'))
                                <span class="help-block">{{$errors->first('linkedin_link')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.instagram_link')}}</label>
                                <input name="instagram_link" value="{{$setting->instagram_link}}" type="text" class="form-control" placeholder="{{trans('setting.instagram_link')}}" >
                                @if($errors->has('instagram_link'))
                                <span class="help-block">{{$errors->first('instagram_link')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.count_1')}}</label>
                                <input name="count_1" value="{{$setting->count_1}}" type="number" class="form-control" placeholder="{{trans('setting.count_1')}}" >
                                @if($errors->has('count_1'))
                                <span class="help-block">{{$errors->first('count_1')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.count_2')}}</label>
                                <input name="count_2" value="{{$setting->count_2}}" type="number" class="form-control" placeholder="{{trans('setting.count_2')}}" >
                                @if($errors->has('count_2'))
                                <span class="help-block">{{$errors->first('count_2')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.count_3')}}</label>
                                <input name="count_3" value="{{$setting->count_3}}" type="number" class="form-control" placeholder="{{trans('setting.count_3')}}" >
                                @if($errors->has('count_3'))
                                <span class="help-block">{{$errors->first('count_3')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.count_4')}}</label>
                                <input name="count_4" value="{{$setting->count_4}}" type="number" class="form-control" placeholder="{{trans('setting.count_4')}}" >
                                @if($errors->has('count_4'))
                                <span class="help-block">{{$errors->first('count_4')}}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">{{trans('setting.header_code')}}</label>
                                <textarea name="body_code" class="form-control" placeholder="{{trans('setting.header_code')}}" >{{$setting->body_code}}</textarea>
                                @if($errors->has('body_code'))
                                <span class="help-block">{{$errors->first('body_code')}}</span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                                <a class="btn btn-danger" href="{{route('getAllSettings')}}">{{trans('backend.cancel')}}</a>
                            </div>
                            <input name="_method" type="hidden" value="PUT">
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
    @endsection