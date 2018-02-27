<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $fillable=['role_name'];
    protected $primaryKey='role_id';
}
