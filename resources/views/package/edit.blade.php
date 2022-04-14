@extends('layout.master')

@section('title')
Packages Edit
@endsection

@section('content')

<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
    </div>
    @endif

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Packages Edit
        @endslot
@endcomponent


    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center> <h5 id="preview" class="card-title center">Package</h5></center>
                    <center class="m-t-30"> <img src="{{asset('storage/'.$packages->photo)}}"
                            class="" width="250"/>
                        <hr>
                        <h4 class="card-title m-t-10" id="name_preview">{{$packages->name}}</h4>
                        <h6 class="card-subtitle text-danger" id="normal_price_preview"><s>{{$packages->normal_price}}</s></h6>
                        <h3 class="card-subtitle" id="end_price_preview">{{$packages->end_price}}</h3>
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
                    <form class="form-horizontal form-material mx-2">
                       <div class="form-group">
                            <label class="col-md-12">Package Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('name') is-invalid @enderror" id="name" name="name" value="{{ $packages->name }}" onchange="previewTitle()">
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
                                <input type="text" class="form-control form-control-line @error('normal_price') is-invalid @enderror" id="normal_price" name="normal_price" value="{{$packages->normal_price}}" onchange="previewNormalPrice()">
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
                                <input type="text" class="form-control form-control-line @error('end_price') is-invalid @enderror" id="end_price" name="end_price" value="{{$packages->end_price}}" onchange="previewEndPrice()">
                                @error('end_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{url('/package')}}" class="btn btn-primary text-white tect">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

    {{-- <div class="col-lg-8 col-xlg-9 col-md-7"> --}}
    <div class="row">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="mb-0 fw-bold">Package Product</h1> 
                </div>
            </div>
        </div>
            
        @foreach ($packages->detail as $package)
        <div class="col-md-2 col-xlg-1 col-md-1">
            <div class="card">
                <div class="card-body">
                    <center> <h5 id="preview" class="card-title center">Product #{{$loop->iteration}}</h5></center>
                    <center class="m-t-30"> <img src="{{asset('storage/'.$package->products->photo)}}" class="img-fluid" width="250"/>
                        <hr>
                        <h4 class="card-title m-t-10"><a href="{{ url('product/' . $package->products->id) }}">{{$package->products->name}}</a></h4>
                        <h6 class="card-subtitle">{{$package->products->publisher}}</h6>
                        <h6 class="card-subtitle">{{$package->quantity}} pcs</h6>
                        <a onclick="return confirm('Apakah anda yakin untuk menghapus data product pada package?')"
                        href="{{ url('package/' . $package->packages_id . '/deleteproduct') }}"
                        class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        </div>

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

    var x = document.getElementById("normal_price").value;
    var y = document.getElementById("end_price").value;
    let old_value = rupiah(x);
    let result = old_value.strike()
    document.getElementById("normal_price_preview").innerHTML = result;
    document.getElementById("end_price_preview").innerHTML = rupiah(y);

    function previewNormalPrice(){
        var x = document.getElementById("normal_price").value;
        let old_value = rupiah(x);
        let result = old_value.strike()
        document.getElementById("normal_price_preview").innerHTML = result;
    }

    function previewEndPrice(){
        var y = document.getElementById("end_price").value;
        document.getElementById("end_price_preview").innerHTML = rupiah(y);
    }

    function previewTitle() {
        var x = document.getElementById("name").value;
        document.getElementById("name_preview").innerHTML = x;
    }

    </script>

    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->

@endsection