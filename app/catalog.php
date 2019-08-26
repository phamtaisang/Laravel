<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catalog extends Model
{
    	protected $table = "catalog";
    	public $timestamps = false;

    	// - Liên kết 1 nhiều dùng hasMany
    	// - 1 loại sản phẩm sẽ có nhiều sản phẩm 
    	public function sanpham(){
    		return $this->hasMany('App\product','id_catalog','id');
    	}

}
