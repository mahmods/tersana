@extends('backend.layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('backend.updateUser')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                <?php $roles=\App\Repositories\RolesRepository::getAllRolesToUsers(); ?>
                <!-- BEGIN FORM-->
                    <form method="post" action="{{route('updateUserById',['userId'=>$user->id])}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.name')}}</label>
                                <input name="name" value="{{$user->name}}" type="text" class="form-control" placeholder="{{trans('backend.name')}}" >
                                @if($errors->has('name'))
                                    <span class="help-block">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.email')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input name="email" value="{{$user->email}}" type="email" class="form-control" placeholder="{{trans('backend.email')}}" required> </div>
                                @if($errors->has('email'))
                                    <span class="help-block">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('backend.update')}}</button>
                                <a class="btn blue" href="{{route('getAllUsers')}}">{{trans('backend.cancel')}}</a>
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