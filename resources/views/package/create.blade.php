@extends('layout.master')

@section('title')
Add Package
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Add Package
        @endslot
@endcomponent

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center> <h5 id="preview" class="card-title center">Preview</h5></center>
                    <center class="m-t-30">
                        <img id="poster_preview" class="img-fluid" width="250" src="../assets/images/poster/poster_preview.png"/>
                        <hr>
                        <h4 id="title" class="card-title m-t-10">Package</h4>
                        <h6 class="card-subtitle" id="normal_price_preview"><s>Normal Price</s></h6>
                        <h3 class="card-subtitle"id="end_price_preview">End Price</h3>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data" action="{{ route('package.store') }}">
                        @csrf 
                        <div class="form-group">
                            <label class="col-md-12">Package Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" onchange="previewTitle()">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Products</label>
                            <div class="col-md-12">
                                {{-- <select class="form-select form-select-line" id="product" name="products[]" multiple> --}}
                                    <select name="products[]" multiple class="form-select form-select-line" id="product">
                                    @foreach ($products as $product)
                                         <option value="{{ $product->id }}">{{ $product->name }}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Quantity</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Normal Price</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('normal_price') is-invalid @enderror" id="normal_price" name="normal_price" value="{{ old('normal_price') }}" onchange="previewNormalPrice()">
                                @error('normal_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">End Price</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('end_price') is-invalid @enderror" id="end_price" name="end_price" value="{{ old('end_price') }}" onchange="previewEndPrice()">
                                @error('end_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Poster</label>
                                <input class="form-control form-control-lg @error('photo') is-invalid @enderror" id="photo" name="photo" type="file" onchange="previewImage(event)">
                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Add Package</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type='text/javascript'>
   $(document).ready(function() {
    $('#product').select2();
});
</script>

<script>
var previewImage = function(event) {
    var output = document.getElementById('poster_preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };

  const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }

  function previewTitle() {
        var x = document.getElementById("name").value;
        document.getElementById("title").innerHTML = x;
    }

    function previewNormalPrice() {
        var x = document.getElementById("normal_price").value;
        document.getElementById("normal_price_preview").innerHTML = rupiah(x);
    }

    function previewEndPrice() {
        var y = document.getElementById("end_price").value;
        document.getElementById("end_price_preview").innerHTML = rupiah(y);
    }
</script>

@endsection