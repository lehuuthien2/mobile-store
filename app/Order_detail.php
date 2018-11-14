<?php

namespace mobileS;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'product_price', 'product_quantity',
        'product_name', 'product_color', 'product_promotion', 'product_storage', 'amount'
    ];

}
