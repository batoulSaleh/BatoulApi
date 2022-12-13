@extends('admin.master.master')
@section('name')
details of order 
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i>
                <small class="float-right">history : {{ $order->created_at->toDayDateTimeString() }}</small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">

            <div class="col-sm-6 invoice-col">

              <address>
                <strong> details of customer </strong><br>
                customer name :<strong style="float: right;">  {{ $order->customer_name }}   </strong><br>
                customer phone :<strong style="float: right;">{{ $order->customer_phone }}   </strong><br>
               <strong> addresses </strong><br>


                    @php

                        echo $order->guest_address;

                    @endphp
              </address>
            </div>

          </div>
          <!-- /.row -->


          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <p class="lead">Payment:</p>

              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                {{$order->payment_id}}
              </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Price</p>

              <div class="table-responsive">
                 <table class="table">
                  <tr>
                    <th>total price :</th>
                    <td>{{ $order->total_price }}</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a onclick="window.print()" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>

            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

@endsection
