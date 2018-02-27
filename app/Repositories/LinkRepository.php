<?php

namespace App\Repositories;
use App\Link;
use App\LinkSection;
use Auth;
use File;
class LinkRepository extends BaseRepository
{
    protected $link;
    public function __construct()
    {
        $this->link=new Link();
    }
    public function getAllLinks()
    {
        return $this->getAllItems($this->link);
    }
    public function postAddLink($data,$link)
    {
        $this->addItem($data,$link);
    }
    public function getLinkById($linkId)
    {
        return $this->getItemById($linkId,$this->link);
    }
    public function updateLinkById($linkId,$data)
    {
        $this->updateItemById($linkId,$data,$this->link);
    }

    public function deleteLinkById($linkId)
    {
        $this->deleteItemById($linkId,$this->link);
    }

    public function getAllLinkSections()
    {
        return Linksection::all();
    }
    static public function getLinkNameById($link_section_id)
    {
        return Linksection::where('link_section_id',$link_section_id)->first()['name'];
    }
    static public function getLinksBySectionId($link_section_id)
    {
        return Link::where('active',1)->where('link_section_id',$link_section_id)->get();
    }
}