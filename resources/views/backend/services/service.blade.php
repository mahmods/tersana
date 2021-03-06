@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>{{trans('service.update_service')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="{{route('updateServiceById',['serviceId'=>$service->service_id])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('service.service_name')}}</label>
                                <input name="name" value="{{$service->name}}" type="text" class="form-control" placeholder="أدخل عنوان القسم" >
                                @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="single-prepend-text" class="control-label">{{trans('service.section_name')}}</label>
                                <div class="input-group select2-bootstrap-prepend">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="single-prepend-text">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                    <select name="service_section_id" id="single-prepend-text" class="form-control select2">
                                        <option value="{{$service->service_section_id}}">
                                        {!! \App\Repositories\ServiceSectionRepository::serviceSectionsToView()->where('service_section_id',$service->service_section_id)->first()['name'] !!}
                                        </option>
                                        @foreach($sections as $i=>$section)
                                        <option value="{{$section->service_section_id}}">{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('service.short_description')}}</label>
                                <textarea name="short_description" class="form-control" placeholder="{{trans('service.short_description')}}">{{$service->short_description}}</textarea>
                                @if($errors->has('short_description'))
                                <span class="help-block">
                                    {{$errors->first('short_description')}}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('service.long_description')}}</label>
                                <textarea name="long_description" class="ckeditor" placeholder="{{trans('service.long_description')}}">{{$service->long_description}}</textarea>
                                @if($errors->has('long_description'))
                                <span class="help-block">
                                    {{$errors->first('long_description')}}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('service.active')}}</label>
                                <div class="input-group">
                                    @if($service->active == 1)
                                    <input type="checkbox" name="active" class="checkbox" value="1" checked>
                                    @else
                                    <input type="checkbox" name="active" class="checkbox" value="1" >
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('service.show_in_homepage')}}</label>
                                <div class="input-group">
                                    @if($service->show_in_homepage == 1)
                                    <input type="checkbox" name="show_in_homepage" class="checkbox" value="1" checked>
                                    @else
                                    <input type="checkbox" name="show_in_homepage" class="checkbox" value="1" >
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('service.image')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input name="image" type="file" class="form-control" >
                                    <img height="70" src="{{ASSETS}}/images/services/{{$service->image}}">
                                    @if($errors->has('image'))
                                    <span class="help-block">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                                <a class="btn blue" href="{{route('getAllServiceSections')}}">{{trans('backend.cancel')}}</a>
                            </div>
                            <input type="hidden" name="_method" value="PUT">
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
    @endsection