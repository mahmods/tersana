@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a style="margin: 5px;" class="btn blue" href="{{route('getAddUser')}}">
            <i class="fa fa-pencil"></i> {{trans('backend.addUser')}}
        </a>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>{{trans('backend.allUsers')}}</div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('backend.name')}}</th>
                                <th>{{trans('backend.email')}}</th>
                                <th width="1%">{{trans('backend.action')}}</th>
                                <th width="1%"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $i=>$user)
                            <tr class="odd gradeX">
                                <td>{{$i+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="clearfix">
                                        <a class="btn green btn-outline" href="{{route('getUserById',['id'=>$user->id])}}">
                                            {{trans('backend.update')}}
                                        </a>      
                                    </div>
                                </td>
                                 <td>
                                @if($user->id==1) 
                                <div class="clearfix">
                                    <a href="javascript:;" class="btn default disabled"> {{trans('backend.delete')}} </a>
                                </div>    
                                @else
                                <div class="clearfix">
                                    <form class="form-delete-c" method="post" onclick="return confirm('هل أنت  متأكد من  هذا الحذف')" action="{{route('deleteUserById',['id'=>$user->id])}}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn red btn-outline">{{trans('backend.delete')}}
                                        </button>
                                    </form>
                                </div>  
                                @endif
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