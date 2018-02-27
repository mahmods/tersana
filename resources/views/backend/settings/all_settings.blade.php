@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
    
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>{{trans('setting.all_settings')}}</div>
                    <div class="tools">               
                    </div>
                </div>
                <div class="portlet-body">
                    <table class=" responsive table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                            <tr>
                                <th width="1%">{{trans('setting.site_title')}}</th>
                                <th width="1%">{{trans('setting.site_description')}}</th>
                                <th width="1%">{{trans('setting.address')}}</th>
                                <th width="1%">{{trans('setting.phone')}}</th>
                                <th width="1%">{{trans('setting.sales_email')}}</th>
                                <th width="1%">{{trans('setting.info_email')}}</th>
                                <th width="1%">{{trans('setting.facebook_link')}}</th>
                                <th width="1%">{{trans('setting.twitter_link')}}</th>
                                <th width="1%">{{--{{trans('setting.linkedin_link')}}--}}</th>
                                <th width="1%">{{--{{trans('setting.instagram_link')}}--}}</th>
                                <th width="1%">{{--trans('setting.cashing_methods')--}}</th>
                                <th width="1%">{{trans('backend.action')}}</th>
                                <th width="1%"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $i=>$setting)
                            <tr class="odd gradeX">
                                <td>{{$setting->site_title}}</td>
                                <td>{{$setting->site_description}}</td>
                                <td>{{$setting->address}}</td>
                                <td>{{$setting->phone}}</td>
                                <td>{{$setting->sales_email}}</td>
                                <td>{{$setting->info_email}}</td>
                                <td>{{--$setting->facebook_link--}}</td>
                                <td>{{--$setting->twitter_link--}}</td>
                                <td>{{--$setting->linkedin_link--}}</td>
                                <td>{{--$setting->instagram_link--}}</td>
                                <td>{{--$setting->cashing_methods--}}</td>                                
                                <td>
                                    <div class="clearfix">
                                        <a class="btn green btn-outline" href="{{route('getSettingById',['settingId'=>$setting->setting_id])}}">
                                            {{trans('backend.update')}}
                                        </a>      
                                    </div>
                                </td>
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
@section('js')
<script src="{{ASSETS}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{ASSETS}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="{{ASSETS}}/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
@endsection
@section('css')
<link href="{{ASSETS}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{ASSETS}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
@endsection