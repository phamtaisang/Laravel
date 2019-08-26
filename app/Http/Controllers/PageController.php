<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use App\product;
use App\catalog;
use App\User;
use Hash;
use Cart;
use Mail;
use App\transaction;
use App\oder;
use DB; 
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
	function __construct()
	{
		$loaisp = catalog::all();
        $sanphamhot = product::where('hot',1)->take(4)->get();
        $sanphammoi = product::orderBy('id','desc')->take(4)->get();
		view()->share('loaisp',$loaisp);
        view()->share('sanphamhot',$sanphamhot);
        view()->share('sanphammoi',$sanphammoi);
        if (Auth::check()) {
            view()->share('nguoidung',Auth::user());
        }
	}
    //trang chủ 
    public function getIndex()
    {
        $data = Cart::getContent();
    	$sanpham = product::where('hot',1)->take(4)->get();
    	$sanphammoi = product::orderBy('id','desc')->paginate(8);
        $data = Cart::getContent();
    	//dd($sanphammoi);
    	return view('pages.trangchu',['sanpham'=>$sanpham],['sanphammoi'=>$sanphammoi]);
    }

    public function getGioiThieu()
    {
    	return view('pages.gioithieu');
    }

    public function getLienHe()
    {
    	return view('pages.lienhe');
    }
    // chi tiet 1 san pham
    public function getMotSanPham($id)
    {
    	$sanpham = product::find($id);
    	$sanphamlienquan = product::where('id_catalog',$sanpham->id_catalog)->paginate(3);
    	$sanphamhot = product::where('hot',1)->take(4)->get();
    	//dd($sanphamhot);
    	$sanphammoi = product::orderBy('id','desc')->take(4)->get();

    	//dd($sanphammoi);
    	//dd(array($sanphamlienquan));

    	return view('pages.chitietsanpham',['sanpham'=>$sanpham],['sanphamlienquan'=>$sanphamlienquan],['sanphamhot'=>$sanphamhot],['sanphammoi'=>$sanphammoi]);
    }
    //loai san pham
    public function getLoaisp($id)
    {
        $sanpham = product::where('id_catalog',$id)->paginate(3); //lấy ra all sản phâm theo id loại sản phẩm
    	$sanphammoi = product::orderBy('id','desc')->take(3)->get();
    	return view('pages.loaisanpham',['sanpham'=>$sanpham],['sanphammoi'=>$sanphammoi]);
    }
//-------------------------------------------------------------
     //them vao gio hang
    public function getAddCart($id)
    {
        $product = product::find($id);
        Cart::add(array(
        'id' => $id,
        'name' => $product->name,
        'price' => $product->count,
        'quantity' => 1,
        'attributes' => array(
        'img'=>$product->images,
        )
        ));

        return redirect('trangchu');
       
    }
    public function getAddCart_2($id)
    {
        $product = product::find($id);
        Cart::add(array(
        'id' => $id,
        'name' => $product->name,
        'price' => $product->count,
        'quantity' => 1,
        'attributes' => array(
        'img'=>$product->images,
        )
    ));

        return redirect('cart/show');
    }

    //lay thong tin gio hang 
    public function getShowCart()
    {
        $data = Cart::getContent();
        //dd($data);
        return view('pages.giohang',['data'=>$data]);
    }

    public function postThanhToan(Request $req)
    {
      /*  $email = $req->email;
        $data['info'] = $req->all();
        $data['cart'] = Cart::getContent();
        $data['total'] = Cart::getTotal();
        Mail::send('pages.email',$data,function($messages) use($email){
            $messages->from('phamtaisang97@gmail.com','SangPham_PTS');
            $messages->to($email,$email);
            $messages->cc('taocaomat@gmail.com','TaoCaoMat');
            $messages->subject('Xác nhận hóa đơn mua hàng ở SangPham');
            
        });*/
      
      $cart['items'] = Cart::getContent();
      //dd($cart);
      if(!Auth::user()){
      $user = new user;
      $user->name = $req->name;
      $user->email = $req->email;
      $user->password = "123456";
      $user->address = $req->address;
      $user->level = 0;
      $user->phone = $req->phone;
      $user->save();
      $user_id=$user->id;
      $data = [];
        foreach($cart['items'] as  $value) {
            $data[] = [
                'id_user' => $user_id,
                'id_product' => $value->id,
                'amount' => $value->price,
                'qty' => $value->quantity,
                'message' => 'Mua hàng trực tiếp ! ',
            ];
        }
         DB::table('transaction')->insert($data);   
     }
      else{
        $data = [];
        $user_id = Auth::user()->id;
        foreach($cart['items'] as  $value) {
            $data[] = [
                'id_user' => $user_id,
                'id_product' => $value->id,
                'amount' => $value->price,
                'qty' => $value->quantity,
                'message' => 'khách hàng có tài khoản',
            ];
        }
         DB::table('transaction')->insert($data);   
        }
        return redirect('cart/complete');
    
    }

    public function getComplete()
    {
        return view('pages.hoanthanh');
    }
    
    //xoa gio hang
    public function xoaCart($id)
    {
        Cart::remove($id);
           return redirect('cart/show');
    }


    //-----------------------------------------------------
    public function getDangNhap()
    {
        return view('pages.dangnhap');
    }
    //kiem tra dang nhap
    public function postDangNhap(Request $request)
    {
       
      $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                $user = Auth::User();
                 if($user->level == 1){
                    return redirect()->intended('admin/theloai/danhsach');
                }
                else
                return redirect()->intended('trangchu');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    public function getDangKy()
    {
        return view('pages.dangky');
    }

    //dang ky
    public function postDangKy(Request $request)
    {
       $this->validate($request,
            [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:32',
            'passwordAgain'=>'required|same:password'
            ],
            [
            'name.required'=>'Bạn nhập tên người dùng',
            'email.required' =>'Bạn chưa nhập Email ',
            'email.email'=>'Bạn chưa nhập đúng định dạng email ',
            'email.unique'=>'Email đã tồn tại ',
            'password.required'=>'Bạn chưa nhập mật khẩu ',
            'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu chỉ được 32 ký tự nhé ',
            'passwordAgain.required'=>'Chưa nhập lại mật khẩu ',
            'passwordAgain.same'=>'Mật khẩu nhập lại không khớp nhé !'

            ]);
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->level = 0;
            $user->save();
            return redirect()->back()->with('thongbao',' Chúc mừng ban đã đăng ký thành công ^^ ');
    }
    // get trang sua dang ky
    public function getInfo()
    {
        return view('pages.info');
    }
    public function getdangxuat()
    {
        Auth::logout();
         return redirect('trangchu');
    } 
    
}
