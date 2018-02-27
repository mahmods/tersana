<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['contact_id', 'name', 'email', 'phone', 'message','address'];
    protected $primaryKey='contact_id';
    protected $table='contacts';
}
