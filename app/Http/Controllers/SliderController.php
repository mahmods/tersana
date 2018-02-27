<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;
use App\Repositories\SliderRepository;

/**
 * Class SliderController
 * @package App\Http\Controllers
 */
class SliderController extends Controller
{
    protected $sliderRepository;
    /**
     * @var slider
     */
    protected $slider;
    public function __construct()
    {
        $this->sliderRepository=new SliderRepository();
        $this->slider=new Slider();
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sliders=$this->sliderRepository->getAllSliders();
        return view('backend.sliders.all_sliders',compact('sliders'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.sliders.add_slider');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'short_description'=>'required|max:255',
            //'image' =>'image|mimes:jpeg,jpg,png,gif|required|max:5120',
        ]);
        $this->sliderRepository->postAddSlider($request,$this->slider);
        return redirect()->route('getAllSliders');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $sliderId
     * @return \Illuminate\Http\Response
     */
    public function show($sliderId)
    {
        $sliders=$this->sliderRepository->getAllSliders();
        $slider=$this->sliderRepository->getSlidetDetailsBySliderId($sliderId);
        return view('front.sliders.slider_details',compact('slider','sliders'));
    }

    /**
     * @param $sliderId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($sliderId)
    {
        $slider=$this->sliderRepository->getSliderById($sliderId);
        return view('backend.sliders.slider',compact('slider'));
    }
    /**
     * @param $sliderId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($sliderId, Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'short_description'=>'required|max:255',
            //'image' =>'image|mimes:jpeg,jpg,png,gif|required|max:5120',
        ]);

        $this->sliderRepository->updateSliderById($sliderId,$request);
        return redirect()->route('getAllSliders');
    }

    /**
     * @param $sliderId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($sliderId)
    {
        $this->sliderRepository->deleteSliderById($sliderId);
        return redirect()->route('getAllSliders');
    }
}