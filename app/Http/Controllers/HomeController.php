<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\SliderRepository;
use App\Repositories\ServiceRepository;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    protected $sliderRepository;
    protected $serviceRepository;
    public function __construct()
    {
        $this->sliderRepository=new SliderRepository();
        $this->serviceRepository=new ServiceRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=$this->sliderRepository->getAllSliders();
        $services=$this->serviceRepository->getTopServices();
        return view('front.pages.index',compact('sliders','services'));
    }
}
