@extends('backend.layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a style="margin: 5px;" class="btn blue" href="{{route('getAddServiceSection')}}">
                <i class="fa fa-pencil"></i> {{trans('backend.addSection')}}
            </a>
            </a>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>{{trans('backend.allSections')}}</div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('backend.name')}}</th>
                            <th>{{trans('backend.description')}}</th>
                            <th>{{trans('backend.image')}}</th>
                            <th width="10%"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $i=>$section)
                            <tr class="odd gradeX">
                                <td>{{$i+1}}</td>
                                <td>{{$section->name}}</td>
                                <td>{{$section->description}}</td>
                                <td><img height="50" src="{{ASSETS}}/images/services/sections/{{$section->image}}"></td>
                                <td width="10%">
                                    <a href="{{route('getServiceSectionById',['sectionId'=>$section->service_section_id])}}"><i class="fa fa-pencil-square-o"></i></a>
                                    <form class="form-delete-c" method="post" onclick="return confirm('هل أنت  متأكد من  هذا الحذف')" action="{{route('deleteServiceSectionById',['sectionId'=>$section->service_section_id])}}">
                                        {{ csrf_field() }}
                                        <button type="submit">
                                            <i style="color: #3c8dbc"  class="fa fa-trash"></i>
                                        </button>
                                    </form>
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