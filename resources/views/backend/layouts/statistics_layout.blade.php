@extends('backend.layouts.main_layout')
@section('content')
    @include('backend.includes.statistics')
@endsection

@section('js')
<script src="{{ASSETS}}/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="{{ASSETS}}/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
@endsection