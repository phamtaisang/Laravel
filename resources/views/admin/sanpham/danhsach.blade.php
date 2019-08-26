 @extends('admin.layout.index')
 @section('content')
            <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                         @if(session('thongbao'))
                                <div class="alert alert-danger">
                                    {{ session('thongbao') }}
                                </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="row">
                            @foreach($sanpham as $sp)
                                <div class="col-sm-3">
                                    <div class="sanpham">
                                        <div class="anh">
                                            <img src="upload/sanpham/{{ $sp->images }}">
                                        </div>
                                        <div class="ten">
                                            {{ $sp->name }}
                                        </div>
                                        <div class="gia">
                                            {{ number_format($sp->count) }}VNĐ
                                        </div>
                                        <div class="menu">
                                            <a href="admin/sanpham/sua/{{ $sp->id }}">Sửa</a>
                                            <a href="admin/sanpham/xoa/{{ $sp->id }}">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                     
                         <div style="text-align: center;">
                            {{ $sanpham->links() }} {{-- this is phân trang quá là vi dieu :)))))) --}}
                         </div>
                    </table>       
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection