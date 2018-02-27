@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>{{trans('backend.addPage')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="{{route('updatePageById',['pageId'=>$page->page_id])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.pageTitle')}}</label>
                                <input name="title" value="{{$page->title}}" type="text" class="form-control" placeholder="{{trans('backend.pageTitle')}}" >
                                @if($errors->has('title'))
                                <span class="help-block">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.pageDescription')}}</label>
                                <textarea name="description"  class="ckeditor" placeholder="{{trans('backend.pageDescription')}}">{{$page->description}}</textarea>
                                @if($errors->has('description'))
                                <span class="help-block">
                                    {{$errors->first('description')}}
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{trans('backend.activation')}}</label>
                                <div class="input-group">
                                    @if($page->active ==1)
                                    <input type="checkbox" name="active" class="checkbox" value="1" checked="">
                                    @else
                                    <input type="checkbox" name="active" class="checkbox" value="1">
                                    @endif
                                </div>    

                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.image')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input name="image" type="file" class="form-control">
                                    <img height="80" src="{{ASSETS}}/images/pages/{{$page->image}}">
                                    @if($errors->has('image'))
                                    <span class="help-block">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                                <a class="btn blue" href="{{route('getAllPages')}}">{{trans('backend.cancel')}}</a>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
    @endsection