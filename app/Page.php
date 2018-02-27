<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable=['page_id', 'title', 'description', 'image', 'active', 'created_by'];
    protected $primaryKey='page_id';
    protected $table='pages';
}
