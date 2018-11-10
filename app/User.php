<?php

namespace mobileS;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'tel', 'address', 'gender', 'birthday', 'avatar', 'permission',
    ];

    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */

//    public function getRouteKeyName()
//    {
//        return 'user_id';
//    }


    public function orders()
    {
        return $this->hasMany('mobileS\Order','user_id', 'user_id');
    }
    public function news()
    {
        return $this->hasMany('mobileS\News','user_id', 'user_id');
    }
    public function comments()
    {
        return $this->hasMany('mobileS\Comment', 'user_id', 'user_id');
    }

    public function owns(News $news ){
        return $this->user_id == $news->user_id;
    }

    public function canEdit(News $news){
        return $this->permission == 4 || $this->owns($news);
    }

    public function isAdministrator(){
        return $this->permission == 4;
    }
}
