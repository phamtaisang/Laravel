 @extends('admin.layout.index')
 @section('content') 
  <!-- Page Content -->
        <div id="page-wrapper">
           @foreach($user->sanpham as $i)
           		$i->name
           @endforeach
        </div>
        <!-- /#page-wrapper -->
@endsection