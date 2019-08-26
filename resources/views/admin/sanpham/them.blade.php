 @extends('admin.layout.index')
 @section('content')
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
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
                        <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label> Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="catalog">
                                    @foreach($theloai as $tl)
                                    <option value="{{ $tl->id }}">{{ $tl->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="form-group">
                                <label>Count</label>
                                <input class="form-control" name="count" placeholder=" ex :100000 vnđ" />
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="images">
                            </div>
                             <div class="form-group">
                                <label> Sản phẩm hot </label>
                                <label class="radio-inline">
                                    <input name="hot" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="hot" value="1" type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection