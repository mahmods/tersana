<?php

namespace App\Repositories;
use App\BlogCategory;
use Auth;
use File;
class BlogCategoryRepository extends BaseRepository
{
    protected $blogCategory;
    public function __construct()
    {
        $this->blogCategory=new BlogCategory();
    }
    public function getAllBlogCategories()
    {
        return $this->getAllItems($this->blogCategory);
    }

    public function postAddBlogCategory($data,$blogCategory)
    {
        if ($data->hasFile('image'))
        {
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/blogs/categories';
            $file->move($destinationPath, $picture);
            $blogCategory->fill(['image'=>$picture]);
        }
        $blogCategory->fill(['name'=>$data->name]);
        $blogCategory->fill(['description'=>$data->description]);
        $blogCategory->fill(['active'=>$data->active]);
        $blogCategory->fill(['created_by'=>Auth::user()->id]);
        $blogCategory->save();
        return $blogCategory;

    }
    public function getBlogCategoryById($blogCategoryId)
    {
        return $this->getItemById($blogCategoryId,$this->blogCategory);
    }

    public function updateBlogCategoryById($blogCategoryId,$data)
    {
        $blogCategory=$this->blogCategory->find($blogCategoryId);
        if ($data->hasFile('image'))
        {
            $photoName=$blogCategory->image;
            File::delete('public/assets/images/blogs/categories/'.$photoName);
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/blogs/categories';
            $file->move($destinationPath, $picture);
            $blogCategory->fill(['image'=>$picture]);
        }
        $blogCategory->fill(['name'=>$data->name]);
        $blogCategory->fill(['description'=>$data->description]);
        $blogCategory->fill(['active'=>$data->active]);
        $blogCategory->save();
        return $blogCategory;
    }

    public function deleteblogCategoryById($blogCategoryId)
    {
        $blogCategory=$this->blogCategory->find($blogCategoryId);
        $photoName=$blogCategory->image;
        File::delete('public/assets/images/blogs/categories/'.$photoName);
        $this->deleteItemById($blogCategoryId,$this->blogCategory);
    }

    static public function blogCategoriesToView()
    {
        return BlogCategory::all();
    }
}