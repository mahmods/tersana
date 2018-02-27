<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['client_id', 'name', 'email', 'phone', 'logo', 'other', 'external_link', 'created_by', 'active'];
    protected $primaryKey='client_id';
    protected $table='clients';
}
