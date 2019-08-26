<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    	protected $table = "comment";
    	public $timestamps = false;

    	
    	public function comment(){
    		return $this->belongsTo('App\product','id_product','id');
    	}

        public function user(){
            // - lien ket 1 - 1 liet ket từ bảng Con tới bảng Cha 
            // - nen ta sử dụng belongTo nhe
            return $this->belongsTo('App\user','id_user','id');
        }

}
