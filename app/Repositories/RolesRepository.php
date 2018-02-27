<?php

namespace App\Repositories;
use App\SidebarItems;
use App\SidebarMenus;
use App\UserRoles;

/**
 * Class RolesRepository
 * @package App\Repositories
 */
class RolesRepository extends BaseRepository
{
    /**
     * RolesRepository constructor.
     */
    protected $role;
    /**
     * @var SidebarItems
     */
    protected $sidebarItem;
    /**
     * @var SidebarMenus
     */
    protected $sidebarMenu;

    /**
     * RolesRepository constructor.
     */
    public function __construct()
    {
        //$this->setModel(new UserRoles());
        $this->role=new UserRoles();
        $this->sidebarItem=new SidebarItems();
        $this->sidebarMenu=new SidebarMenus();
    }

    /**
     * @return mixed
     */
    public function getAllRoles()
    {
        return $this->getAllItems($this->role);
    }

    /**
     * @param $data
     */
    public function postAddRole($data)
    {
        $this->addItem($data,$this->role);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    static public function getAllSidebarItemsToRoles()
    {
        return SidebarItems::where('active',1)->get();
    }

    /**
     * @param $route_access
     */
    public function postAddRolesToItems($route_access)
    {
        $role=UserRoles::orderBy('role_id','desc')->first()['role_id'];
        foreach ($route_access as $route)
        {
            $item=$this->getItemById($route,$this->sidebarItem);
            $item->fill(['roles_access'=>$item->roles_access.','.$role]);
            $item->save();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllSidebarMenus()
    {
        return SidebarMenus::all();
    }
    /**
     * @param $menu_id
     * @return \Illuminate\Support\Collection
     */
    static public function getAllSidebarItemsByItemId($menu_id)
    {
        return SidebarItems::orderBy('ordering','asc')->where('menu_id',$menu_id)->where('active',1)->get();
    }

    static public function getAllRolesToUsers()
    {
        return UserRoles::all();
    }
}