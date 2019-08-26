 @extends('admin.layout.index')
 @section('content') 
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình Luận 
                            <small>Danh sách</small>
                        </h1>
                    </div>
                      @if(session('thongbao'))
                                <div class="alert alert-danger">
                                    {{ session('thongbao') }}
                                </div>
                        @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Level</th>             
                                <th>Xóa</th>             
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $us->id }}</td>
                                <td>{{ $us->name }}</td>
                                <td>{{ $us->email }}</td>
                                <td>{{ $us->level }}
                                    @if($us->level==1)
                                    {{ "Admin" }}
                                    @else
                                    {{ "Thường" }}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-info-o  fa-fw"></i><a href="admin/user/xoa/{{ $us->id }}">Xóa</a></td>
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