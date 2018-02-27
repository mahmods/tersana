@extends('backend.layouts.main_layout')
@section('content')
<div class="row">
	<div class="col-md-12">
	<a style="margin: 5px;" class="btn blue" href="{{route('getAddPage')}}">
			<i class="fa fa-pencil"></i> {{trans('backend.addPage')}}
		</a>
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>{{trans('backend.pages')}}
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a>
					<a href="#portlet-config" data-toggle="modal" class="config"> </a>
					<a href="javascript:;" class="reload"> </a>
					<a href="javascript:;" class="remove"> </a>
				</div>
				</div>
				<div class="portlet-body flip-scroll">
					<table class="table table-bordered table-striped table-condensed flip-content">
						<thead class="flip-content">
							<tr>
								<th>{{trans('backend.pageTitle')}}</th>
								<th width="60%">{{trans('backend.pageDescription')}}</th>
								<th>{{trans('backend.image')}}</th>
								<th width="1%">{{trans('backend.action')}}</th>
								<th width="1%"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($pages as $i=>$page)
							<tr>
								<td>{{$page->title}}</td>
								<td>{!! html_entity_decode($page->description) !!}</td>
								<td><img width="100" src="{{ASSETS}}/images/pages/{{$page->image}}"></td>

								<td>
                                <div class="clearfix">
                                    <a class="btn green btn-outline" href="{{route('getPageById',['pageId'=>$page->page_id])}}">
                                        {{trans('backend.update')}}
                                    </a>
                                </div>
                                </td>
                                @if($page->page_id==1) 
                                <td>
                                <div class="clearfix">
                                    <a href="javascript:;" class="btn default disabled"> {{trans('backend.delete')}} </a>
                                </div>    
                                </td>
                                @else
                                <td>
                                <div class="clearfix">
                                    <form class="form-delete-c" method="post" onclick="return confirm('<?php echo trans('backend.confirmDelete');?>')" action="{{route('deletePageById',['pageId'=>$page->page_id])}}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn red btn-outline">{{trans('backend.delete')}}
                                        </button>
                                    </form>
                                </div>
                                </td>
                                @endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endsection