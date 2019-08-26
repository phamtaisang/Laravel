<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\user;
use App\transaction;
class KhachHangController extends Controller
{
	public function DanhSach(){
		
		$user = user::all();
		return view('admin.khachhang.danhsach',['user'=>$user]);
	}
	public function GetDanhSachAll($id){
		$transaction = transaction::where('id_user',$id)->get();
	
		foreach ($transaction as $key) {
			dd($key->sanpham->name);
		}
		return view('admin.khachhang.DanhsachAll',['transaction'=>$transaction]);
	}	
	public function HoaDon($id){
		$user = user::find($id);
		return view('admin.khachhang.hoadon',['user'=>$user]);
	}
	public function DanhSachSP($id){
		$hoadon = transaction::find($id);
		return view('admin.khachhang.chitietsanpham',['hoadon'=>$hoadon]);
	}
	public function GetXoa($id){
		
		$theloai = transaction::find($id);
		$theloai->delete();
		return redirect('admin/khachhang/hoadon/'.$id)->with('thongbao','Bạn đã xóa thành công');
	}
}