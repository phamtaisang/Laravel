<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    	protected $table = "product";
    	public $timestamps = false;

    	public function loaisanpham(){
    		// - lien ket 1 - 1 liet ket từ bảng Con tới bảng Cha 
    		// - nen ta sử dụng belongTo nhe
    		return $this->belongsTo('App\catalog','id_catalog','id');
    	}
    	public function sanpham(){
    		return $this->hasMany('App\transaction','id_product','id');
    	}
        public function comment(){
            return $this->hasMany('App\comment','id_product','id');
        }
    	
}
