<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'customer_first_name',
        'customer_last_name',
        'customer_email',
        'customer_username',
        'customer_user_type',
        'password',
        // 'customer_status',
    ];

    protected $hidden = [
     'password', 'remember_token',
    ];
}
