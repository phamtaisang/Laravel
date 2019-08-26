<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\user;
class UserController extends Controller
{
	public function DanhSach(){
		
		$user = user::all();
		return view('admin.user.danhsach',['user'=>$user]);
	}
	 public function GetThem()
    {
 
        return view('admin.user.them');
    }

    public function PostThem(Request $request)
    {
    	echo $request;
    	/*$this->validate($request,
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
        $user = new user;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->level= $request->level;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thành công rồi ');*/

    }	
	public function GetXoa($id){
		
		$user = user::find($id);
		$user->delete();
		return redirect('admin/user/danhsach')->with('thongbao','Bạn vừa xóa 1 tài khoản ');
	}
    public function getdangnhapAdmin(){
        return view('admin.login');
    }
}