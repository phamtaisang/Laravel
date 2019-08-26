<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\product;
use App\catalog;
use Cart;
use App\oder;
class ThanhToanController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function  postThanhToan(){
    $oder = new oder;
      $cart = Cart::getContent();
      $oder->id_user = Auth::user()->id;
      $data_tien = Cart::getTotal();
      $oder->amount = ;
      foreach ($cart as $key) {
           $oder->id_product = $key->id;
       }
        return redirect('cart/complete');
	}
}
