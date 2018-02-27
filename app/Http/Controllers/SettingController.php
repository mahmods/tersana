<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;
use App\Repositories\SettingRepository;

/**
 * Class SettingController
 * @package App\Http\Controllers
 */
class SettingController extends Controller
{
    protected $settingRepository;
    /**
     * @var $setting
     */
    protected $setting;
    public function __construct()
    {
        $this->SettingRepository=new SettingRepository();
        $this->setting=new Setting();
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings=$this->SettingRepository->getAllsettings();
        return view('backend.settings.all_settings',compact('settings'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    }

    /**
     * @param $settingId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($settingId)
    {
        $setting=Setting::find($settingId);
       return view('backend.settings.setting',compact('setting'));
    }
    /**
     * @param $settingId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($settingId, Request $request)
    {
    	
        $setting=Setting::find($settingId);
        $setting->fill($request->all());
        $setting->save();
        return redirect()->route('getAllSettings');
    }

    /**
     * @param $settingId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($settingId)
    {
        $this->settingRepository->deleteSettingById($settingId);
        return redirect()->route('getAllsettings');
    }
}