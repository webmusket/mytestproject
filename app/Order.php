<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'user_data' => 'object',
        'order_data' => 'object'
    ];
}
