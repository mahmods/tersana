<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['site_title', 'site_description', 'address', 'phone','whatsapp', 'sales_email', 'info_email', 'facebook_link', 'twitter_link', 'linkedin_link','instagram_link','cashing_methods','header_code','body_code','services_code','clients_code','blog_code','count_1','count_2','count_3','count_4'];
    protected $table='settings';
    protected $primaryKey='setting_id';
}    