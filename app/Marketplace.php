<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    protected $fillable = [
        'project_name', 'project_location', 'project_price', 'project_desc', 'project_status','project_image'
    ];
}
