<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SidebarItems extends Model
{
    protected $fillable=['item_id', 'menu_id', 'name', 'route', 'roles_access', 'icon', 'ordering', 'active'];
    protected $primaryKey='item_id';
    protected $table='sidebar_items';
}
