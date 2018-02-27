<?php

namespace App\Http\Controllers;
use App\BlogCategory;
use Illuminate\Http\Request;
use App\Repositories\BlogCategoryRepository;

/**
 * Class BlogCategoryController
 * @package App\Http\Controllers
 */
class BlogCategoryController extends Controller
{
	protected $blogCategoryRepository;
    /**
     * @var BlogCategory
     */
    protected $blogCategory;
    public function __construct()
    {
    	$this->blogCategoryRepository=new BlogCategoryRepository();
    	$this->blogCategory=new BlogCategory();
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories=$this->blogCategoryRepository->getAllBlogCategories();
        return view('backend.blogs.categories.all_blog_categories',compact('categories'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.blogs.categories.add_blog_category');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:70',
            'description'=>'required',
        ]);
        $this->blogCategoryRepository->postAddBlogCategory($request,$this->blogCategory);
        return redirect()->route('getAllBlogCategories');
    }

    /**
     * @param $categoryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($categoryId)
    {
        $category=$this->blogCategoryRepository->getBlogCategoryById($categoryId);
        return view('backend.blogs.categories.category',compact('category'));
    }

    /**
     * @param $categoryId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($categoryId, Request $request)
    {
        $this->blogCategoryRepository->updateBlogCategoryById($categoryId,$request);
        return redirect()->route('getAllBlogCategories');
    }

    /**
     * @param $categoryId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($categoryId)
    {
        $this->blogCategoryRepository->deleteBlogCategoryById($categoryId);
        return redirect()->route('getAllBlogCategories');
    }

    static public function blogCategoriesToView()
    {
        return blogCategory::all();
    }
}