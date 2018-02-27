<?php

namespace App\Http\Controllers;
use App\Blog;
use App\BlogCategory;
use Illuminate\Http\Request;
use App\Repositories\BlogRepository;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
	protected $blogRepository;
    /**
     * @var Blog
     */
    protected $blog;
    public function __construct()
    {
    	$this->blogRepository=new BlogRepository();
    	$this->blog=new Blog();
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs=$this->blogRepository->getAllBlogs();
        return view('backend.blogs.all_blogs',compact('blogs'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFront()
    {
        $blogs=$this->blogRepository->getAllPaginateBlogs(3);
        $newest_blogs=$this->blogRepository->getNewestBlogs(4);
        $categories=$this->blogRepository->getAllBlogCategories();
        return view('front.blogs.all_blogs',compact('blogs','categories','newest_blogs'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexFrontByCategoryId($categoryId)
    {
        $blogs=$this->blogRepository->getBlogsByCategoryId($categoryId);
        $newest_blogs=$this->blogRepository->getNewestBlogs(4);
        $categories=$this->blogRepository->getAllBlogCategories();
        return view('front.blogs.all_blogs',compact('blogs','categories','newest_blogs'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
    	$categories=$this->blogRepository->getAllBlogCategories();
        return view('backend.blogs.add_blog',compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:70',
            'short_description'=>'required|max:200',
            'long_description'=>'required',
            //'image'           =>'image|mimes:jpeg,jpg,png,gif|required|max:5120',
        ]);
        $this->blogRepository->postAddBlog($request,$this->blog);
        return redirect()->route('getAllBlogs');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $blogId
     * @return \Illuminate\Http\Response
     */
    public function show($blogId)
    {
        $blog=$this->blogRepository->getBlogDetailsByBlogId($blogId);
        $newest_blogs=$this->blogRepository->getNewestBlogs(4);
        $realated_blogs=$this->blogRepository->getRelatedBlogs($blog->blog_category_id,4);
        $categories=$this->blogRepository->getAllBlogCategories();

        return view('front.blogs.blog_details',compact('blog','newest_blogs','realated_blogs','categories'));
    }

    /**
     * @param $blogId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($blogId)
    {
    	$categories=$this->blogRepository->getAllBlogCategories();
        $blog=$this->blogRepository->getBlogById($blogId);
        return view('backend.blogs.blog',compact('blog','categories'));
    }

    /**
     * @param $blogId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($blogId, Request $request)
    {
        $this->blogRepository->updateBlogById($blogId,$request);
        return redirect()->route('getAllBlogs');
    }

    /**
     * @param $blogId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($blogId)
    {
        $this->blogRepository->deleteBlogById($blogId);
        return redirect()->route('getAllBlogs');
    }
}