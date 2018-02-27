<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SidebarMenus extends Model
{
    protected $fillable=['menu_id', 'name', 'roles_access', 'icon', 'ordering', 'active', 'have_header', 'class'];
    protected $primaryKey='menu_id';
    protected $table='sidebar_menus';
}
