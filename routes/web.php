<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('theloai',function(){
	Schema::create('catalog',function($table){
		$table->increments('id');
		$table->string('name',200);
		$table->timestamps();
	});
	echo "vừa tạo bảng xog nè";
});
Route::get('sanpham',function(){
	Schema::create('product',function($table){
		$table->increments('id');
		$table->integer('id_catalog')->unsigned();
        $table->foreign('id_catalog')->references('id')->on('catalog');
		$table->string('name',100);
		$table->longtext('content',255);
		$table->string('images');
		$table->float('count');
		$table->integer('view')->default(0);
		$table->timestamps();
	});
	echo "vừa tạo bảng sản phẩm xog nè";
});

Route::get('user',function(){
	Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone');
			$table->string('address');
			$table->integer('level');
            $table->rememberToken();
            $table->timestamps();
        });
	echo "em đã tạo bảng user";
});

Route::get('giaodich',function(){
	Schema::create('transaction',function($table){
		$table->increments('id');
		$table->integer('id_user')->unsigned();
        $table->foreign('id_user')->references('id')->on('user');
        $table->integer('id_product')->unsigned();
        $table->foreign('id_product')->references('id')->on('product');
		$table->float('amount');
		$table->integer('qty');
		$table->string('pay_ment');
		$table->string('pay_info');
		$table->string('message');
		$table->timestamps();
	});
	echo "đã tạo giao dịch nhé";
});

Route::get('dathang',function(){
	Schema::create('oder',function($table){
        $table->increments('id');
        $table->text('name_kh');
        $table->text('email');
        $table->text('name_product');
		$table->float('amount');
		$table->date('date');
		$table->text('note');
		$table->timestamps();
	});
	echo "vừa tạo bảng đăt hàng xog nè";
});
Route::get('binhluan',function(){
	Schema::create('comment',function($table){
		$table->integer('id_user')->unsigned();
        $table->foreign('id_user')->references('id')->on('user');
        $table->increments('id');
        $table->integer('id_product')->unsigned();
        $table->foreign('id_product')->references('id')->on('product');
		$table->integer('content');
		$table->date('date');
		$table->timestamps();
	});
	echo "vừa tạo bảng bình luận xog nè";
});
//insert dữ liệu thông qua model 
Route::get('model/theloai',function(){
	$catalog = new App\catalog();
	$catalog->name = "Sang 2";
	$catalog->save();
	echo "dã thực hiện lệnh";
});

//truy vấn lấy all the loai 
Route::get('model/theloai/all',function(){
	$theloai = App\catalog::all()->toArray();
	var_dump($theloai);
});

Route::get('testlienket',function(){
 $data = App\product::find(3)->loaisanpham->toArray();
 var_dump($data);

});

Route::get('loaisp',function(){
 $data = App\catalog::find(1)->sanpham->toArray();
foreach ($data as $i) {
	var_dump($i);
	echo "<br> <hr>";
}
});


// bắt đầu 


Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'theloai'],function(){

		Route::get('danhsach','TheLoaiController@DanhSach');
		
		Route::get('them','TheLoaiController@GetThem');
		Route::post('them','TheLoaiController@PostThem');

		Route::get('sua/{id}','TheLoaiController@GetSua');
		Route::post('sua/{id}','TheLoaiController@PostSua');
		
		Route::get('xoa/{id}','TheLoaiController@GetXoa');
	}); /*het the loai*/

	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','SanPhamController@DanhSach');
		Route::get('them','SanPhamController@GetThem');
		Route::post('them','SanPhamController@PostThem');
		Route::get('sua/{id}','SanPhamController@GetSua');
		Route::post('sua/{id}','SanPhamController@PostSua');
		Route::get('xoa/{id}','SanPhamController@GetXoa');
	});

	Route::group(['prefix'=>'khachhang'],function(){
		Route::get('danhsach','KhachHangController@DanhSach');
		Route::get('danhsachAll/{id}', 'KhachHangController@GetDanhSachAll');
		Route::get('hoadon/{id}','KhachHangController@HoaDon');
		Route::get('sanpham/{id}','KhachHangController@DanhSachSP');
		Route::get('xoa/{id}','KhachHangController@GetXoa');
	});

	Route::group(['prefix'=>'comment'],function(){
		Route::get('danhsach','CommentController@DanhSach');
		Route::get('noidung/{id}','CommentController@NoiDung');
		Route::get('xoa/{id}','CommentController@GetXoa');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@DanhSach');
		Route::get('xoa/{id}','UserController@GetXoa');
		Route::get('them','UserController@GetThem');
		Route::post('them','UserController@PostThem');
	});

}); /*het admin*/

		Route::get('trangchu','PageController@getIndex');
		Route::get('gioithieu','PageController@getGioiThieu');
		Route::get('lienhe','PageController@getLienHe');
		Route::get('thongtinsanpham/{id}','PageController@getMotSanPham');
		Route::get('loaisanpham/{id}','PageController@getLoaisp');
		Route::post('comment/{id}','CommentController@postComment');


		Route::group(['prefix'=>'cart'],function(){
			Route::get('add/{id}','PageController@getAddCart');
			Route::get('add_chitiet/{id}','PageController@getAddCart_2');
			Route::get('show','PageController@getShowCart');
			Route::post('thanhtoan','PageController@postThanhToan');
			Route::get('xoa/{id}','PageController@xoaCart');
			Route::get('update','PageController@getUpdateCart');
			Route::get('complete','PageController@getComplete');
		});

		Route::group(['prefix'=>'dang-nhap'],function(){
			Route::get('login','PageController@getDangNhap');
			Route::post('login','PageController@postDangNhap');
			Route::get('info/{id}','PageController@getInfo');
			Route::post('info/{id}','PageController@postInfo');
			Route::get('dangxuat','PageController@getdangxuat');
			Route::get('dangky','PageController@getDangKy');
			Route::post('dangky','PageController@postDangKy');
		});
		Route::get('email',function(){
			return view('pages.email');
		});
