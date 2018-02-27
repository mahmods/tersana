<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkSection extends Model
{
    protected $fillable=['name'];
    protected $table='link_sections';
    protected $primaryKey='link_section_id';
}    