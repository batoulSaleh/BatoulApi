@extends('admin.master.masterar')
@section('name')
products
@endsection
@section('content')

<div class="row">

    <!-- right column -->
    <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title" style="float: right;">تعديل منتج</h3>
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
          <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.productt.update') }}">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="id">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>name </label>
                  <input type="text" class="form-control" value="{{ $product->name }}" name="name" placeholder="Enter ...">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- textarea -->
                <div class="form-group">
                  <label> description</label>
                  <textarea class="form-control"  name="description" rows="3" placeholder="Enter ...">{{ $product->description }}</textarea>
                </div>
              </div>

            </div>

              <div class="row">
                <div class="col-sm-4">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>price</label>
                    <input type="number" value="{{ $product->price }}" class="form-control" name="price" placeholder="Enter ...">
                  </div>
                </div>
 


              </div>

              <div class="row">
                <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                    <label> category</label>
                    <select name="categoryy_id" class="form-control">
                        @foreach ($categories as $category)

                        <option  {{ ($category->id == $product->categoryy_id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>

                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>image</label>
                    <input type="file" id="img" class="form-control" name="img" placeholder="Enter ...">
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">
                    <img class="" width="100px" height="100px" id="showimage" src="{{  (!empty($product->img)) ? url($product->img) : url('upload/no_image.jpg')  }}" alt="">

                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">

                    <input type="submit" class="btn btn-info" name="" value="edit " placeholder="Enter ...">
                  </div>
                </div>

              </div>






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
    const box = document.getElementById('box');

function handleRadioClick() {
  if (document.getElementById('show').checked) {
    box.style.display = 'block';
  } else {
    box.style.display = 'none';
  }
}

const radioButtons = document.querySelectorAll('input[name="have_discount"]');
radioButtons.forEach(radio => {
  radio.addEventListener('click', handleRadioClick);
});

</script>
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
