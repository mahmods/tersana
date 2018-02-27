<?php
namespace App\Repositories;
use App\Service;
use App\ServiceSections;
use Auth;
use File;
class ServiceRepository extends BaseRepository
{
    protected $service;
    protected $serviceSection;
    public function __construct()
    {
        $this->service=new Service();
        $this->serviceSection=new ServiceSections();
    }
    public function getAllServices()
    {
        return $this->getAllItems($this->service);
    }
    public function getAllServiceSections()
    {
        return $this->getAllItems($this->serviceSection);
    }
    public function postAddService($data,$service)
    {
        if ($data->hasFile('image'))
        {
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/services';
            $file->move($destinationPath, $picture);
            $service->fill(['image'=>$picture]);
        }
        $service->fill(['name'=>$data->name]);
        $service->fill(['service_section_id'=>$data->service_section_id]);
        $service->fill(['short_description'=>$data->short_description]);
        $service->fill(['long_description'=>$data->long_description]);
        $service->fill(['active'=>$data->active]);
        $service->fill(['show_in_homepage'=>$data->show_in_homepage]);
        $service->fill(['created_by'=>Auth::user()->id]);
        $service->save();
        return $service;
    }
    public function getServiceById($serviceId)
    {
        return $this->getItemById($serviceId,$this->service);
    }
    public function updateServiceById($serviceId,$data)
    {
        $service=$this->service->find($serviceId);
        if ($data->hasFile('image'))
        {
            $photoName=$service->image;
            File::delete('public/assets/images/services/'.$photoName);
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/services';
            $file->move($destinationPath, $picture);
            $service->fill(['image'=>$picture]);
        }
        $service->fill(['name'=>$data->name]);
        $service->fill(['service_section_id'=>$data->service_section_id]);
        $service->fill(['short_description'=>$data->short_description]);
        $service->fill(['long_description'=>$data->long_description]);
        $service->fill(['active'=>$data->active]);
        $service->fill(['show_in_homepage'=>$data->show_in_homepage]);
        $service->save();
        return $service;
    }

    public function deleteServiceById($serviceId)
    {
        $service=$this->service->find($serviceId);
        $photoName=$service->image;
        File::delete('public/assets/images/services/'.$photoName);
        $this->deleteItemById($serviceId,$this->service);
    }

    public function getTopServices()
    {
        return Service::orderBy('service_id','desc')->where('active',1)->where('show_in_homepage',1)->take(3)->get();
    }

    public function getServiceDetailsByServiceId($serviceId)
    {
        return $this->getItemById($serviceId,$this->service);
    }

    static public function serviceToView()
    {
        return Service::orderBy('service_id','desc')->where('active',1)->get();
    }
}