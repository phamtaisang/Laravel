 @extends('admin.layout.index')
 @section('content')
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                         @if(count($errors)>0)
                           <div class="alert alert-danger">
                               @foreach($errors->all() as $err)
                               {{ $err }} <br>
                               @endforeach
                           </div>
                           @endif

                           @if(session('thongbao'))
                            <div class="alert alert-danger">
                                {{ session('thongbao') }}
                            </div>
                           @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/theloai/sua/{{ $theloai->id }}" method="POST">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="name" value="{{ $theloai->name }}" placeholder="Please Enter Category Name"/>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Category Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection