<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PageRepository;
use App\Page;

class PageController extends Controller
{
    protected $pageRepository;
    /**
     * @var User
     */
    protected $page;
    public function __construct()
    {
        $this->pageRepository=new PageRepository();
        $this->page=new Page();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=$this->pageRepository->getAllPages();
        return view('backend.pages.all_pages',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.add_page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'title'              =>'required|max:255',
            'description'        =>'required',
            'image'              =>'image|mimes:jpeg,jpg,png,gif|required|max:5120',
            
            ]);
        $this->pageRepository->postAddPage($request,$this->page);
        return redirect()->route('getAllPages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pageId)
    {
        $page=$this->pageRepository->getPageById($pageId);
        return view('front.pages.page_details',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pageId)
    {
        $page=$this->pageRepository->getPageById($pageId);
        return view('backend.pages.page',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pageId)
    {
        $this->pageRepository->updatePageById($pageId,$request);
        return redirect()->route('getAllPages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($pageId)
    {
        $this->pageRepository->deletePageById($pageId);
        return redirect()->route('getAllPages');
    }
}
