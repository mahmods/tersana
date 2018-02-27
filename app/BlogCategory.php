<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable=['blog_category_id','name','description'];
    protected $table='blog_categories';
    protected $primaryKey='blog_category_id';
}
