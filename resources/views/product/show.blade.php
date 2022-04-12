@extends('layout.master')

@section('title')
Product Detail
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Product Detail
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
                    <center class="m-t-30"> <img src="{{asset('storage/'.$product->photo)}}"
                            class="" width="250"/>
                        <hr>
                        <h4 class="card-title m-t-10">{{$product->name}}</h4>
                        <h6 class="card-subtitle">{{$product->categories->name}}</h6>
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
                            <label class="col-md-12">Game Title</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$product->name}}"
                                    class="form-control form-control-line" id="name" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="year" class="col-md-12">Category</label>
                            <div class="col-md-12">
                                <input type="text" value={{$product->categories->name}}
                                    class="form-control form-control-line" name="year"
                                    id="year" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{url('/product')}}" class="btn btn-primary text-white tect">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
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