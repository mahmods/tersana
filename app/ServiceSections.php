<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSections extends Model
{
    protected $fillable=['service_section_id', 'name', 'description', 'image', 'active', 'created_by'];
    protected $table='service_sections';
    protected $primaryKey='service_section_id';
}
