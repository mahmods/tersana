@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a style="margin: 5px;" class="btn blue" href="{{route('getAddService')}}">
            <i class="fa fa-pencil"></i> {{trans('service.add_service')}}
        </a>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe">  {{trans('service.all_services')}}</i></div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('service.name')}}</th>
                                <th width="30%">{{trans('service.short_description')}}</th>
                                <th>{{trans('service.image')}}</th>
                                <th>{{trans('service.activation')}}</th>
                                <th width="10%">{{trans('backend.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $i=>$service)
                            <tr class="odd gradeX">
                                <td>{{$i+1}}</td>
                                <td>{{$service->name}}</td>
                                <td>{{$service->short_description}}</td>
                                <td><img height="70" src="{{ASSETS}}/images/services/{{$service->image}}"></td>
                                <td>{{trans('service.'.$service->active)}}</td>
                               <td>
                                <div class="clearfix">
                                    <a class="btn green btn-outline" href="{{route('getServiceById',['serviceId'=>$service->service_id])}}">
                                        {{trans('backend.update')}}
                                    </a>
                                </div>
                                </td>
                                <td>
                                <div class="clearfix">
                                    <form class="form-delete-c" method="post" onclick="return confirm('<?php echo trans('backend.confirmDelete');?>')" action="{{route('deleteServiceById',['serviceId'=>$service->service_id])}}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn red btn-outline">{{trans('backend.delete')}}
                                        </button>
                                    </form>
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