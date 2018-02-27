@extends('backend.layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> {{trans('backend.updateClient').' '.$client->name}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                <!-- BEGIN FORM-->
                    <form method="post" action="{{route('updateClientById',['clientId'=>$client->client_id])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.clientName')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input name="name" value="{{$client->name}}" type="text" class="form-control" placeholder="{{trans('backend.clientName')}}" required> </div>
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
                                    <input name="email" value="{{$client->email}}" type="email" class="form-control" placeholder="{{trans('backend.email')}}" required>
                                </div>
                                    @if($errors->has('email'))
                                        <span class="help-block">{{$errors->first('email')}}</span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.phone')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone-square"></i>
                                    </span>
                                    <input name="phone" value="{{$client->phone}}" type="number" class="form-control" placeholder="{{trans('backend.phone')}}" required> 
                                </div>
                                    @if($errors->has('phone'))
                                        <span class="help-block">{{$errors->first('phone')}}</span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.externalLink')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-mail-reply"></i>
                                    </span>
                                    <input name="external_link" value="{{$client->external_link}}" type="text" class="form-control" placeholder="{{trans('backend.externalLink')}}" required> </div>
                                    @if($errors->has('external_link'))
                                        <span class="help-block">{{$errors->first('external_link')}}
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{trans('backend.other')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </span>
                                    <textarea  name="other" placeholder="{{trans('backend.other')}}" class="form-control" >{{$client->other}}</textarea>
                                    @if($errors->has('other'))
                                        <span class="help-block">{{$errors->first('other')}}
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{trans('backend.active')}}</label>
                                <div class="input-group">
                                    @if($client->active==1)
                                    <input type="checkbox" name="active" class="checkbox" value="1" checked="">
                                    @else
                                    <input type="checkbox" name="active" class="checkbox" value="1">
                                    @endif
                                </div>    
                                    
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('backend.logo')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-picture-o"></i>
                                    </span>
                                    <input name="logo" type="file" class="form-control" >
                                    
                                    @if($errors->has('logo'))
                                        <span class="help-block">{{$errors->first('logo')}}</span>
                                    @endif
                                </div>
                                <img height="70" src="{{ASSETS}}/images/clients/{{$client->logo}}">
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                                <a class="btn blue" href="{{route('getAllClients')}}">{{trans('backend.cancel')}}</a>
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