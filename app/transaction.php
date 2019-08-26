<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    	protected $table = "transaction";
    	public $timestamps = false;

    	
    	public function sanpham(){
    		return $this->belongsTo('App\product','id_product','id');
    	}

        public function user(){
            // - lien ket 1 - 1 liet ket từ bảng Con tới bảng Cha 
            // - nen ta sử dụng belongTo nhe
            return $this->belongsTo('App\user','id_user','id');
        }

}
