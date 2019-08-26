<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\catalog;
class TheLoaiController extends Controller
{
	public function DanhSach(){
		
		$theloai = catalog::all();
		return view('admin.theloai.danhsach',['theloai'=>$theloai]);
	
	}
	public function GetThem(){
		return view('admin.theloai.them');
	}

	public function PostThem(Request $request){

		$this->validate($request,[
			'name'=>'required|min:3',
		],[
			'name.required'=>'Bạn phải điền tên thể loại ! ',
			'name.min'=>'Bạn phải nhập ít nhất là 3 ký tự ! ',
		]);
		//echo $request->name;
		$theloai = new catalog;
		$theloai->name = $request->name;
		$theloai->save();
		return redirect('admin/theloai/them')->with('thongbao','Đã thêm thành công ! ');
	}

	public function GetSua($id){

		$theloai= catalog::find($id);
		return view('admin.theloai.sua',['theloai'=>$theloai]);
	}
	public function PostSua(Request $request,$id){

		$theloai = catalog::find($id);
		
		$this->validate($request,[
			'name'=>'required|unique:catalog,name|min:3',
		],[
			'name.required'=>'Bạn phải điền tên thể loại ! ',
			'name.min'=>'Bạn phải nhập ít nhất là 3 ký tự ! ',
			'name.unique'=>'Tên đã tồn tại !'
		]);
		$theloai->name = $request->name;
		$theloai->save();
		return redirect('admin/theloai/danhsach')->with('thongbao','Sửa thành công ! ');

	}

	public function GetXoa($id){
		
		$theloai = catalog::find($id);
		$theloai->delete();
		return redirect('admin/theloai/danhsach')->with('thongbao','Bạn đã xóa thành công');
	}

}