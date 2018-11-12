<?php

namespace mobileS;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $primaryKey = 'factory_id';

    public function products()
    {
        return $this->hasMany('mobileS\Product','factory_id','factory_id');
    }
}
