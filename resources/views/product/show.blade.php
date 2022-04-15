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
                        <h6 class="card-subtitle">{{$product->publisher}}</h6>
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
                                    class="form-control form-control-line" name="category"
                                    id="category" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Release Year</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$product->year}}"
                                    class="form-control form-control-line" id="year" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Developer</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$product->developer}}"
                                    class="form-control form-control-line" id="developer" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Publisher</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$product->publisher}}"
                                    class="form-control form-control-line" id="publisher" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="javascript:history.back()" class="btn btn-primary text-white tect">Back</a>
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