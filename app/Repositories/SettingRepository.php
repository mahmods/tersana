<?php

namespace App\Repositories;
use App\Setting;
use Auth;
class SettingRepository extends BaseRepository
{
    protected $setting;
    public function __construct()
    {
        $this->setting=new Setting();
    }
    public function getAllSettings()
    {
        return $this->getAllItems($this->setting);
    }
   
    public function getSettingById($settingId)
    {
        return $this->getItemById($settingId,$this->setting);
    }
    public function updateSettingById($settingId,$data)
    {
        $this->updateItemById($settingId,$data,$this->setting);
    }

    static public function getSettingValue($settingName)
    {
        return Setting::where('setting_id',1)->first()[$settingName];
    }

    
     
    
    
}