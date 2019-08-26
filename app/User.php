<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{   protected $table = "user";
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
   
        public $timestamps = false;

        public function hoadon(){
            // - lien ket 1 - 1 liet ket từ bảng Con tới bảng Cha 
            // - nen ta sử dụng belongTo nhe
            return $this->hasMany('App\transaction','id_user','id');
        }
         public function comment(){
            // - lien ket 1 - 1 liet ket từ bảng Con tới bảng Cha 
            // - nen ta sử dụng belongTo nhe
            return $this->hasMany('App\comment','id_user','id');
        }
}
