<?php

namespace App\Http\Controllers;
use App\Repositories\ServiceSectionRepository;
use App\ServiceSections;
use Illuminate\Http\Request;

class ServiceSectionController extends Controller
{
    protected $serviceSectionRepository;
    protected $serviceSection;
    public function __construct()
    {
        $this->serviceSectionRepository=new ServiceSectionRepository();
        $this->serviceSection=new ServiceSections();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=$this->serviceSectionRepository->getAllServiceSections();
        return view('backend.services.sections.all_sections',compact('sections'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.sections.add_service_section');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->serviceSectionRepository->postAddServiceSections($request,$this->serviceSection);
        return redirect()->route('getAllServiceSections');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $sectionId
     * @return \Illuminate\Http\Response
     */
    public function show($sectionId)
    {
        //

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $sectionId
     * @return \Illuminate\Http\Response
     */
    public function edit($sectionId)
    {
        $section=$this->serviceSectionRepository->getSectionServiceById($sectionId);
        return view('backend.services.sections.section',compact('section'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $sectionId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sectionId)
    {
        $this->serviceSectionRepository->updateSectionServiceById($sectionId,$request);
        return redirect()->route('getAllServiceSections');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sectionId
     * @return \Illuminate\Http\Response
     */
    public function delete($sectionId)
    {
        $this->serviceSectionRepository->deleteSectionServiceById($sectionId);
        return redirect()->route('getAllServiceSections');
    }
}
