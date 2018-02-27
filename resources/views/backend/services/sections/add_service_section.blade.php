@extends('backend.layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('backend.addSection')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="{{route('postAddServiceSection')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.sectionName')}}</label>
                                <input name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="{{trans('backend.sectionName')}}" >
                                @if($errors->has('name'))
                                    <span class="help-block">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.sectionDescription')}}</label>
                                <textarea name="description" class="form-control" placeholder="{{trans('backend.sectionDescription')}}">{{old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <span class="help-block">
                                    {{$errors->first('description')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{trans('backend.active')}}</label>
                                <div class="input-group">
                                    <input type="checkbox" name="active" class="checkbox" value="1">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('save')}}</button>
                                <a class="btn blue" href="{{route('getAddServiceSection')}}">{{trans('backend.cancel')}}</a>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
@endsection