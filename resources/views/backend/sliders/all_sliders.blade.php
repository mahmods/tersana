@extends('backend.layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a style="margin: 5px;" class="btn blue" href="{{route('getAddSlider')}}">
                <i class="fa fa-pencil"></i> {{trans('slider.add_slider')}}
            </a>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>{{trans('slider.all_sliders')}}</div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('slider.title')}}</th>
                            <th>{{trans('slider.short_description')}}</th>
                            <th>{{trans('slider.image')}}</th>
                            <th width="1%">{{trans('backend.action')}}</th>
                            <th width="1%"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $i=>$slider)
                            <tr class="odd gradeX">
                                <td>{{$i+1}}</td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->short_description}}</td>
                                <td><img height="70" src="{{ASSETS}}/images/sliders/{{$slider->image}}"></td>
                                <td>
                                    <div class="clearfix">
                                        <a class="btn green btn-outline" href="{{route('getSliderById',['sliderId'=>$slider->slider_id])}}">
                                            {{trans('backend.update')}}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="clearfix">
                                        <form class="form-delete-c" method="post" onclick="return confirm('<?php echo trans('backend.confirmDelete');?>')" action="{{route('deleteSliderById',['sliderId'=>$slider->slider_id])}}">
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