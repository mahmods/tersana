<?php

namespace App\Http\Controllers;
use App\Link;
use Illuminate\Http\Request;
use App\Repositories\LinkRepository;

/**
 * Class LinkController
 * @package App\Http\Controllers
 */
class LinkController extends Controller
{
    protected $linkRepository;
    /**
     * @var Link
     */
    protected $link;
    public function __construct()
    {
        $this->linkRepository=new LinkRepository();
        $this->link=new Link();
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $links=$this->linkRepository->getAllLinks();
        return view('backend.links.all_links',compact('links'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $sections=$this->linkRepository->getAllLinkSections();
        return view('backend.links.add_link',compact('sections'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
        ]);
        $this->linkRepository->postAddLink($request->all(),$this->link);
        return redirect()->route('getAllLinks');
    }

    /**
     * @param $linkId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($linkId)
    {
        $sections=$this->linkRepository->getAllLinkSections();
        $link=$this->linkRepository->getLinkById($linkId);
        return view('backend.links.link',compact('link','sections'));
    }
    /**
     * @param $linkId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($linkId, Request $request)
    {
    	$this->validate($request,[
            'title'=>'required|max:100',
        ]);
        $this->linkRepository->updateLinkById($linkId,$request->all());
        return redirect()->route('getAllLinks');
    }

    /**
     * @param $linkId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($linkId)
    {
        $this->linkRepository->deleteLinkById($linkId);
        return redirect()->route('getAllLinks');
    }
}