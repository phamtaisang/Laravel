 @extends('admin.layout.index')
 @section('content')
            <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết đơn hàng
                            <small>Đơn hàng</small>
                        </h1>
                         @if(session('thongbao'))
                                <div class="alert alert-danger">
                                    {{ session('thongbao') }}
                                </div>
                        @endif
                    </div>

                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <tbody>
                           <div class="thongtin" style="text-align: left;">
                            
                            <div class="images_sp" style="border-bottom: 1px solid red; width: 300px">
                                <img src="upload/sanpham/{{ $hoadon->sanpham->images }}" width="300px;">    
                                <br>
                            </div>
                            <p>Tên sản phẩm :<span style="color: red">{{ $hoadon->sanpham->name }} </span></p> 
                            <p style="color:gray">ngày :{{ $hoadon->created_at }} </p> 
                            <p> Giá:<span style="color: blue">{{ number_format($hoadon->sanpham->count) }}</span>.VNĐ</p>
                            <p></p>
                            <p>Thông tin sản phẩm :{{ $hoadon->content }} </p>
                            <p>  số lượng :{{ $hoadon->qty }} </p>
                            
                            </div>
                           
                           
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection