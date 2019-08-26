<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
	public function DanhSach(){
		
		$user = user::all();
		return view('admin.comment.danhsach',['user'=>$user]);
	}	
	public function NoiDung($id){
		$user = user::find($id);
		return view('admin.comment.noidung',['user'=>$user]);
	}
	public function GetXoa($id){
		
		$bl = comment::find($id);
		$bl->delete();
		return redirect('admin/comment/noidung/'.$id)->with('thongbao','Bạn vừa xóa bình luận');
	}
	public function postComment($id,Request $request){
		$id_product = $id;
		$comment = new comment;
		$comment->id_product = $id_product;
		$comment->id_user = Auth::user()->id;
		$comment->content = $request->content;
		$comment->save();
		return redirect("thongtinsanpham/$id")->with('thongbao','Bạn vừa thêm 1 bình luận'); 
	}
}