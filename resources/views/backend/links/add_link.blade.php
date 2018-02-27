@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>{{trans('link.add_link')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="{{route('postAddLink')}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('link.title')}}</label>
                                <input name="title" value="{{old('title')}}" type="text" class="form-control" placeholder="{{trans('link.title_example')}}" >
                                @if($errors->has('title'))
                                <span class="help-block">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('link.route')}}</label>
                                <input name="route" value="{{old('route')}}" type="text" class="form-control" placeholder="{{trans('link.route_example')}}" >
                                @if($errors->has('route'))
                                <span class="help-block">{{$errors->first('route')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="single-prepend-text" class="control-label">{{trans('link.link_section')}}</label>
                                <div class="input-group select2-bootstrap-prepend">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="single-prepend-text">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                    <select name="link_section_id" id="single-prepend-text" class="form-control select2">
                                    <option value="1">{{trans('link.select_link_section')}}</option>
                                        @foreach($sections as $i=>$section)
                                        <option value="{{$section->link_section_id}}">{{trans('link.'.$section->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{trans('link.active')}}</label>
                                <div class="input-group">
                                    <input type="checkbox" name="active" class="checkbox" value="1">
                                </div>    
                                
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                                <a class="btn btn-danger" href="{{route('getAllLinks')}}">{{trans('backend.cancel')}}</a>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
    @endsection