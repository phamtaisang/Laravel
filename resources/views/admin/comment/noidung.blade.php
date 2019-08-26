 @extends('admin.layout.index')
 @section('content')
            <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận của khách hàng
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
                                <th>Email</th>
                                <th>Tên sản phẩm</th>
                                <th>Nội dung bình luận</th>
                                <th>Xóa bình luận</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->comment as $hd)
                                <td>{{ $hd->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $hd->comment->name }}</td>
                                <td>{{ $hd->content }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{ $hd->id }}"> Delete</a></td>
                                
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