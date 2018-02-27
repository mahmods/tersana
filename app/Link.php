<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable=['title','route','link_section_id','active'];
    protected $primaryKey='link_id';
    protected $table='links';
}
