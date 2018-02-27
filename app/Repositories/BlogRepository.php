<?php

namespace App\Repositories;
use App\Blog;
use App\BlogCategory;
use Auth;
use File;
class BlogRepository extends BaseRepository
{
    protected $blog;
    protected $blogCategory;
    public function __construct()
    {
        $this->blog=new Blog();
        $this->blogCategory=new BlogCategory();
    }
    public function getAllBlogs()
    {
        return $this->getAllItems($this->blog);
    }
    public function getAllPaginateBlogs($per_page)
    {
        return $this->paginateItems($this->blog,$per_page);
    }

    public function getAllBlogCategories()
    {
        return $this->getAllItems($this->blogCategory);
    }

    public function postAddBlog($data,$blog)
    {
        if ($data->hasFile('image'))
        {
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/blogs';
            $file->move($destinationPath, $picture);
            $blog->fill(['image'=>$picture]);
        }
        $blog->fill(['title'=>$data->title]);
        $blog->fill(['short_description'=>$data->short_description]);
        $blog->fill(['long_description'=>$data->long_description]);
        $blog->fill(['blog_category_id'=>$data->blog_category_id]);
        $blog->fill(['active'=>$data->active]);
        $blog->fill(['created_by'=>Auth::user()->id]);
        $blog->save();
        return $blog;

    }
    public function getBlogById($blogId)
    {
        return $this->getItemById($blogId,$this->blog);
    }

    public function updateBlogById($blogId,$data)
    {
        $blog=$this->blog->find($blogId);
        if ($data->hasFile('image'))
        {
            $photoName=$blog->image;
            File::delete('public/assets/images/blogs/'.$photoName);
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/blogs';
            $file->move($destinationPath, $picture);
            $blog->fill(['image'=>$picture]);
        }
        $blog->fill(['title'=>$data->title]);
        $blog->fill(['short_description'=>$data->short_description]);
        $blog->fill(['long_description'=>$data->long_description]);
        $blog->fill(['blog_category_id'=>$data->blog_category_id]);
        $blog->fill(['active'=>$data->active]);
        $blog->fill(['updated_by'=>Auth::user()->id]);
        $blog->save();
        return $blog;
    }

    public function deleteblogById($blogId)
    {
        $blog=$this->blog->find($blogId);
        $photoName=$blog->image;
        File::delete('public/assets/images/blogs/categories/'.$photoName);
        $this->deleteItemById($blogId,$this->blog);
    }

    public function getNewestBlogs($number)
    {
        return Blog::orderBy('blog_id','desc')->where('active',1)->take($number)->get();
    }
    public function getRelatedBlogs($blog_category_id,$number)
    {
        return Blog::orderBy('blog_id','desc')->where('blog_category_id',$blog_category_id)->where('active',1)->take($number)->get();
    }

    public function getBlogDetailsByBlogId($blogId)
    {
        return $this->getItemById($blogId,$this->blog);
    }

    public function getBlogsByCategoryId($categoryId)
    {
        return Blog::orderBy('blog_id','desc')->where('blog_category_id',$categoryId)->where('active',1)->paginate(3);
    }

    static public function getBlogsToView()
    {
        return Blog::orderBy('blog_id','desc')->where('active',1)->get();
    }



}