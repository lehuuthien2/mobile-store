<?php

namespace mobileS;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $primaryKey = 'product_id';

    public function factory()
    {
        return $this->belongsTo('mobileS\Factory', 'factory_id', 'factory_id');
    }
}
