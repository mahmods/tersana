<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['blog_id', 'blog_category_id', 'title', 'short_description', 'long_description', 'image'];
    protected $table='blogs';
    protected $primaryKey='blog_id';
}
