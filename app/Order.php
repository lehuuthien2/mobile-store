<?php

namespace mobileS;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    protected $fillable = [
      'user_id', 'total', 'user_name', 'tel', 'address', 'status', 'note'
    ];
}
