@extends('layout.master')

@section('title')
Packages Detail
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Packages Detail
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
                        <h4 class="card-title m-t-10">{{$packages->name}}</h4>
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
                                <input type="text" value="{{$packages->name}}"
                                    class="form-control form-control-line" id="name" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Normal Price</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$packages->normal_price}}" class="form-control form-control-line" id="normal_price" hidden>   
                                <input type="text" class="form-control form-control-line" id="np" readonly>   

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">End Price</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$packages->end_price}}" class="form-control form-control-line" id="end_price" hidden>
                                <input type="text" class="form-control form-control-line" id="ep" readonly>
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


<script>
    
var x = document.getElementById("normal_price").value;
var y = document.getElementById("end_price").value;

const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }
    let old_value = rupiah(x);
    let result = old_value.strike()
    document.getElementById("normal_price_preview").innerHTML = result;
    document.getElementById("np").value = rupiah(x);
    document.getElementById("end_price_preview").innerHTML = rupiah(y);
    document.getElementById("ep").value = rupiah(y);

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