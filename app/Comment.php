<?php

namespace mobileS;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'user_id', 'parent_id', 'content', 'product_id'
    ];

    public function user(){
        return $this->belongsTo('mobileS\User','user_id', 'user_id');
    }
    public function product(){
        return $this->belongsTo('mobileS\Product','product_id','product_id');
    }
}
