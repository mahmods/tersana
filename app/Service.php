<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=['service_id', 'name','service_section_id','short_description','long_description','image', 'active','show_in_homepage','created_by'];
    protected $table='services';
    protected $primaryKey='service_id';

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '')
        {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%")
                    ->orWhere("short_description", "LIKE", "%$keyword%")
                    ->orWhere("long_description", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
