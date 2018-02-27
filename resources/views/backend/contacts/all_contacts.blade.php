@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
   
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>{{trans('contact.all_contacts')}}</div>
                    <div class="tools">               
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('contact.name')}}</th>
                                <th>{{trans('contact.phone')}}</th>
                                <th>{{trans('contact.email')}}</th>
                                <th>{{trans('contact.address')}}</th>
                                <th>{{trans('contact.message')}}</th>
                                <th width="1%">{{trans('backend.action')}}</th>
                                <th width="1%"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $i=>$contact)
                            <tr class="odd gradeX">
                                <td>{{$i+1}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->address}}</td>
                                <td>{{$contact->message}}</td>
                        
                                 <td>
                                <div class="clearfix">
                                    <form class="form-delete-c" method="post" onclick="return confirm('<?php echo trans('backend.confirmDelete');?>')" action="{{route('deleteContactById',['contactId'=>$contact->contact_id])}}">
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