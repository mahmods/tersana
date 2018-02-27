@extends('backend.layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('slider.add_slider')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="{{route('postAddSlider')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('slider.title')}}</label>
                                <input name="title" value="{{old('title')}}" type="text" class="form-control" placeholder="{{trans('slider.title')}}" >
                                @if($errors->has('title'))
                                    <span class="help-block">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('slider.short_description')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <textarea name="short_description" class="form-control" placeholder="{{trans('slider.short_description')}}">{{old('short_description')}}</textarea>
                                </div>
                                @if($errors->has('short_description'))
                                    <span class="help-block">{{$errors->first('short_description')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('slider.long_description')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <textarea name="long_description" class="form-control" placeholder="{{trans('slider.long_description')}}">{{old('long_description')}}</textarea>
                                </div>
                                @if($errors->has('long_description'))
                                    <span class="help-block">{{$errors->first('long_description')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('slider.active')}}</label>
                                <div class="input-group">
                                    <input type="checkbox" name="active" class="checkbox" value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('slider.image')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-picture-o"></i>
                                    </span>
                                    <input name="image" type="file" class="form-control" >
                                    @if($errors->has('image'))
                                        <span class="help-block">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                                <a class="btn btn-danger" href="{{route('getAllSliders')}}">{{trans('backend.cancel')}}</a>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
@endsection