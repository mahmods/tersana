<?php

namespace App\Repositories;
use App\ServiceSections;
use Auth;
use File;
class ServiceSectionRepository extends BaseRepository
{
    protected $serviceSection;
    public function __construct()
    {
        $this->serviceSection=new ServiceSections();
    }
    public function getAllServiceSections()
    {
        return $this->getAllItems($this->serviceSection);
    }

    public function postAddServiceSections($data,$sectionService)
    {
        if ($data->hasFile('image'))
        {
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/services/sections';
            $file->move($destinationPath, $picture);
            $sectionService->fill(['image'=>$picture]);
        }
        $sectionService->fill(['name'=>$data->name]);
        $sectionService->fill(['description'=>$data->description]);
        $sectionService->fill(['active'=>$data->active]);
        $sectionService->fill(['created_by'=>Auth::user()->id]);
        $sectionService->save();
        return $sectionService;

    }
    public function getSectionServiceById($serviceSectionId)
    {
        return $this->getItemById($serviceSectionId,$this->serviceSection);
    }

    public function updateSectionServiceById($serviceSectionId,$data)
    {
        $sectionService=$this->serviceSection->find($serviceSectionId);
        if ($data->hasFile('image'))
        {
            $photoName=$sectionService->image;
            File::delete('public/assets/images/services/sections/'.$photoName);
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/services/sections';
            $file->move($destinationPath, $picture);
            $sectionService->fill(['image'=>$picture]);
        }
        $sectionService->fill(['name'=>$data->name]);
        $sectionService->fill(['description'=>$data->description]);
        $sectionService->fill(['active'=>$data->active]);
        $sectionService->save();
        return $sectionService;
    }

    public function deleteSectionServiceById($serviceSectionId)
    {
        $sectionService=$this->serviceSection->find($serviceSectionId);
        $photoName=$sectionService->image;
        File::delete('public/assets/images/services/sections/'.$photoName);
        $this->deleteItemById($serviceSectionId,$this->serviceSection);
    }

    static public function serviceSectionsToView()
    {
        return ServiceSections::all();
    }
}