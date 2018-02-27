<?php

namespace App\Http\Controllers;
use App\Repositories\ServiceRepository;
use App\Service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    protected $serviceRepository;
    protected $service;
    public function __construct()
    {
        $this->serviceRepository=new ServiceRepository();
        $this->service=new Service();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=$this->serviceRepository->getAllservices();
        return view('backend.services.all_services',compact('services'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFront()
    {
        $sections=$this->serviceRepository->getAllServiceSections();
        $services=$this->serviceRepository->getAllservices();
        return view('front.services.all_services',compact('services','sections'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections=$this->serviceRepository->getAllServiceSections();
        return view('backend.services.add_service',compact('sections'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'short_description'=>'required|max:280',
            //'image' =>'image|mimes:jpeg,jpg,png,gif|required|max:5120',
        ]);
        $this->serviceRepository->postAddService($request,$this->service);
        return redirect()->route('getAllServices');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $serviceId
     * @return \Illuminate\Http\Response
     */
    public function show($serviceId)
    {
        $services=$this->serviceRepository->getAllServices();
        $service=$this->serviceRepository->getServiceDetailsByServiceId($serviceId);
        return view('front.services.service_details',compact('service','services'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $serviceId
     * @return \Illuminate\Http\Response
     */
    public function edit($serviceId)
    {
        $service=$this->serviceRepository->getServiceById($serviceId);
        $sections=$this->serviceRepository->getAllServiceSections();
        return view('backend.services.service',compact('service','sections'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $serviceId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $serviceId)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'short_description'=>'required|max:280',
            //'image' =>'image|mimes:jpeg,jpg,png,gif|required|max:5120',
        ]);
        $this->serviceRepository->updateServiceById($serviceId,$request);
        return redirect()->route('getAllServices');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $serviceId
     * @return \Illuminate\Http\Response
     */
    public function delete($serviceId)
    {
        $this->serviceRepository->deleteServiceById($serviceId);
        return redirect()->route('getAllServices');
    }

    //Search By Keyword
    public function searchByKeyword(Request $request)
    {
        $keyword=$request->keyword;
        $services = Service::SearchByKeyword($keyword)->get();
        return view('front.services.search_services',compact('services','keyword'));
    }
}
