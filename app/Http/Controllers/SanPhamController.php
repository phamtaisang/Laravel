<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\catalog;
use App\product;
class SanPhamController extends Controller
{
	public function DanhSach(){
		
		//$sanpham = product::all();
		// Sử dụng Eloquent Model
		$sanpham = product::paginate(4); //phân trang nhé dễ v:
		return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
	}
	public function GetThem(){
		$theloai = catalog::all();
		return view('admin.sanpham.them',['theloai'=>$theloai]);
	}

	public function PostThem(Request $request){

			$this->validate($request,[
				'name'=>'required',
				'catalog'=>'required',
				'count'=>'required'				
			],[
				'name.required'=>'Bạn chưa nhập tên ',
				'catalog.required'=>'Bạn chưa chọn loại tin ',
				'count.required'=>'Bạn chưa nhập giá cho sản phẩm '
			]);
			$sanpham = new product;
			$sanpham->name = $request->name;
			$sanpham->id_catalog=$request->catalog;
			$sanpham->content = $request->content;
			$sanpham->count = $request->count;
			$sanpham->hot = $request->hot;
			if($request->hasFile('images')){

            $file = $request->file('images');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi !='png' && $duoi !='gif' && $duoi !='jpeg')
            {
                 return redirect('admin/sanpham/them')->with('loi','bạn chỉ được chọn file đuôi jpg,gif,png,jpeg . ');
            }
            
            $name = $file->getClientOriginalName(); //lay ten hinh anh
            
              $Hinh =  str_random(4)."_".$name;
               while (file_exists("upload/sanpham/".$Hinh)) //bat loi chùng anh
            {
               $Hinh =  str_random(4)."_".$name;
            }  

	        //echo $Hinh;
	        $file->move("upload/sanpham",$Hinh);
	        $sanpham->images = $Hinh;
	        $sanpham->save();
	        return redirect('admin/sanpham/them')->with('thongbao','Thêm tin thành công ^^');
   	 	}
	        else
	        {
	            $sanpham->Hinh = "";
	        }
        
	}

	public function GetSua($id){
		$theloai = catalog::all();
		$sanpham = product::find($id);
		return view('admin.sanpham.sua',['theloai'=>$theloai],['sanpham'=>$sanpham]);

		
	}
	public function PostSua(Request $request,$id){

		$sanpham = product::find($id);
		$this->validate($request,[
			'name'=>'required',
			'catalog'=>'required',
			'count'=>'required',
			'images'=>'required'				
		],[
			'name.required'=>'Bạn chưa nhập tên ',
			'catalog.required'=>'Bạn chưa chọn loại tin ',
			'count.required'=>'Bạn chưa nhập giá cho sản phẩm ',
			'images.required'=>'file hình trống '
		]);

		$sanpham->name = $request->name;
		$sanpham->id_catalog=$request->catalog;
		$sanpham->content = $request->content;
		$sanpham->count = $request->count;
		$sanpham->hot = $request->hot;
		if($request->hasFile('images')){

            $file = $request->file('images');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi !='png' && $duoi !='gif' && $duoi !='jpeg')
            {
                 return redirect('admin/sanpham/sua')->with('loi','bạn chỉ được chọn file đuôi jpg,gif,png,jpeg . ');
            }
            
            $name = $file->getClientOriginalName(); //lay ten hinh anh
            
              $Hinh =  str_random(4)."_".$name;
            while (file_exists("upload/sanpham/".$Hinh)) //bat loi chùng anh
            {
               $Hinh =  str_random(4)."_".$name;
            }  

	        //echo $Hinh;
	        $file->move("upload/sanpham",$Hinh);
	        $sanpham->images = $Hinh;
	        $sanpham->save();
	        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa tin thành công ^^');
   	 	}

	}

	public function GetXoa($id){
		
		$theloai = product::find($id);
		$theloai->delete();
		return redirect('admin/sanpham/danhsach')->with('thongbao','Bạn đã xóa thành công');
	}

}