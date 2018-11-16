<?php

namespace mobileS;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'news_id';

    protected $fillable = [
        'user_id', 'title','summary','body','thumbnail','slug'
    ];
    public function user(){
        return $this->belongsTo('mobileS\User','user_id','user_id');
    }
}
