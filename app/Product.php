<?php

namespace mobileS;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name', 'price','factory_id','picture','color','slug','body','description','in_stock','promotion','storage'
    ];
    public function factory()
    {
        return $this->belongsTo('mobileS\Factory', 'factory_id', 'factory_id');
    }
}
