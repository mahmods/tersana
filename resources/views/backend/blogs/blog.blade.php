@extends('backend.layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('blog.update_blog')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="{{route('updateBlogById',['blogId'=>$blog->blog_id])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">{{trans('blog.title')}}</label>
                                <input name="title" value="{{$blog->title}}" type="text" class="form-control" placeholder="{{trans('blog.title')}}" >
                                @if($errors->has('title'))
                                    <span class="help-block">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="single-prepend-text" class="control-label">{{trans('blog.blog_category')}}</label>
                                <div class="input-group select2-bootstrap-prepend">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-select2-open="single-prepend-text">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                    <select name="blog_category_id" id="single-prepend-text" class="form-control select2">
                                    <option value="{{$blog->blog_category_id}}">
                                    {!! \App\Repositories\BlogCategoryRepository::blogCategoriesToView()->where('blog_category_id',$blog->blog_category_id)->first()['name'] !!}
                                    </option>
                                        @foreach($categories as $i=>$category)
                                        <option value="{{$category->blog_category_id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('blog.short_description')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <textarea name="short_description" class="form-control" placeholder="{{trans('blog.short_description')}}" required>{{$blog->short_description}}</textarea> 
                                    </div>
                                    @if($errors->has('short_description'))
                                        <span class="help-block">{{$errors->first('short_description')}}</span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{trans('blog.long_description')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <textarea name="long_description" class="ckeditor" placeholder="{{trans('blog.long_description')}}" required>{{$blog->long_description}}</textarea> 
                                    </div>
                                    @if($errors->has('long_description'))
                                        <span class="help-block">{{$errors->first('long_description')}}</span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{trans('backend.active')}}</label>
                                <div class="input-group">
                                    @if($blog->active == 1)
                                    <input type="checkbox" name="active" class="checkbox" value="1" checked>
                                    @else
                                    <input type="checkbox" name="active" class="checkbox" value="1">
                                    @endif
                                </div>    
                                    
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{trans('backend.image')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-picture-o"></i>
                                    </span>
                                    <input name="image" type="file" class="form-control" >
                                    <img height="80" src="{{ASSETS}}/images/blogs/{{$blog->image}}">
                                    @if($errors->has('image'))
                                        <span class="help-block">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green">{{trans('backend.save')}}</button>
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