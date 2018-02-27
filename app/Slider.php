<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable=['slider_id','title', 'short_description', 'long_description', 'image','created_by','updated_by',];
    protected $table='sliders';
    protected $primaryKey='slider_id';
}
