<?php
namespace App\Repositories;
use App\Page;
use File;
use Illuminate\Support\Facades\Auth;

/**
 * Class PageRepository
 * @package App\Repositories
 */
class PageRepository extends BaseRepository
{
    protected $page;
    /**
     * PageRepository constructor.
     */
    public function __construct()
	{
        $this->page=new Page();
    }

    public function getAllPages()
    {
        return $this->getAllItems($this->page);
    }

    public function postAddPage($data,$page)
    {
        if ($data->hasFile('image'))
        {   
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/pages';
            $file->move($destinationPath, $picture); 
            $page->fill(['image'=>$picture]);
        }
        $page->fill(['title'=>$data->title]);
        $page->fill(['description'=>$data->description]);
        $page->fill(['active'=>$data->active]);
        $page->fill(['created_by'=>Auth::user()->id]);
        $page->save();
        return $page;

    }

    public function getPageById($pageId)
    {
        return $this->getItemById($pageId,$this->page);
    }

    public function updatePageById($pageId,$data)
    {
        $page=$this->page->find($pageId);
        if ($data->hasFile('image'))
        {
            $photoName=$page->image; 
            File::delete('public/assets/images/pages/'.$photoName);    
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/pages';
            $file->move($destinationPath, $picture); 
            $page->fill(['image'=>$picture]);
        }
        $page->fill(['title'=>$data->title]);
        $page->fill(['description'=>$data->description]);
        $page->fill(['active'=>$data->active]);
        $page->save();
        return $page;
    }

    public function deletePageById($pageId)
    {
        $page=$this->page->find($pageId);
        $photoName=$page->image; 
        File::delete('public/assets/images/pages/'.$photoName);    
        $this->deleteItemById($pageId,$this->page);
    }

    public function getPageByIdTo($pageId)
    {
        return $this->getItemById($pageId,$this->page);
    }


    static public function getPagesToView()
    {
        return Page::orderBy('page_id','desc')->where('active',1)->get();
    }

    
}