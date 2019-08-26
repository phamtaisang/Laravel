 @extends('admin.layout.index')
 @section('content')
            <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn đạt hàng
                            <small>Danh sách</small>
                        </h1>
                         @if(session('thongbao'))
                                <div class="alert alert-danger">
                                    {{ session('thongbao') }}
                                </div>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên khách</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>ghi chú</th>
                                <th>xem thêm</th>
                                <th>Xóa đơn hàng</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->hoadon as $hd)
                                <td>{{ $hd->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{  number_format($hd->amount) }}VNĐ</td>
                                <td>{{ $hd->message }}</td>
                                <td><a href="admin/khachhang/sanpham/{{ $hd->id }}"> xem them</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khachhang/xoa/{{ $hd->id }}"> Delete</a></td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection