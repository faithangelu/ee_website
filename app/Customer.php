<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_first_name',
        'customer_last_name',
        'customer_email',
        'customer_username',
        'customer_password',
        'customer_user_type',
        'customer_status',
    ];
}
