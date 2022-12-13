@extends('admin.master.master')
@section('name')
Orders
@endsection
@section('content')
<div class="row">
    <div class="col-12">


      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style="float: right;">All Oredrs</h3><br/>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>id</th>
              <th>Customer name</th>
              <th>Customer phone</th>
              <th>details</th>
              <th>history</th>
            </tr>
            </thead>
            <tbody>
@foreach ($orders as $key=>$order)
<tr>
      <td>{{ $key+=1 }}</td>
      <td>{{ $order->customer_name }}</td>
      <td>{{ $order->customer_phone  }}</td>
      <td>
        <a href="{{ route('admin.order.details',$order->id)  }}" class="btn btn-info sm"><i class=" fas fa-edit"></i></a>
      </td>
      <td>{{ $order->created_at->toDayDateTimeString() }}</td>
      
    </tr>

@endforeach


            </tbody>
            <tfoot>
            <tr>
              <th>id</th>
              <th>Customer name</th>
              <th>Customer phone</th>
              <th>details</th>
              <th>history</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection

@section('script')
<!-- DataTables -->
<script src="/dashboard/plugins/datatables/jquery.dataTables.js"></script>
<script src="/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>






<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>
@endsection
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@endsection
