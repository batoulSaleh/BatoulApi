@extends('admin.master.master')
@section('name')
categories
@endsection
@section('content')

<div class="row">

    <!-- right column -->
    <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title" style="float: right;"> Edit category</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <!-- /.card-header -->
        <div class="card-body">
          <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.category.update') }}">
            @csrf
            <div class="row">
              <div class="col-sm-12">
                <input type="hidden"  value="{{ $category->id }}" name="id" id="">
                <!-- text input -->
                <div class="form-group">
                  <label>name</label>
                  <input type="text" class="form-control" value="{{ $category->name }}" name="name" placeholder="Enter ...">
                </div>
              </div>


            </div>





              <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">

                    <input id="showimage" type="submit" class="btn btn-info" name="" value="edit " placeholder="Enter ...">
                  </div>
                </div>

              </div>



            <!-- end row -->





          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
  <br>
  <br>
  <br>
  <br>
@endsection
@section('script')
<script>

    $(document).ready(function(){

        $('#img').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        });

    });
</script>
@endsection
