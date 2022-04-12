@extends('layout.master')

@section('title')
Movie Detail
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Movie Detail
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
                    <center class="m-t-30"> <img src="{{asset('storage/'.$movies->poster)}}"
                            class="" width="250"/>
                        <hr>
                        <h4 class="card-title m-t-10">{{$movies->movie_name}}</h4>
                        <h6 class="card-subtitle">{{$movies->year}}</h6>
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
                            <label class="col-md-12">Movie Title</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$movies->movie_name}}""
                                    class="form-control form-control-line" id="name" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="year" class="col-md-12">Year</label>
                            <div class="col-md-12">
                                <input type="text" value={{$movies->year}}
                                    class="form-control form-control-line" name="year"
                                    id="year" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Duration</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$movies->duration}} minutes"
                                    class="form-control form-control-line" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Country</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$movies->country}}"
                                    class="form-control form-control-line" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line" readonly>{{$movies->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{url('/movie')}}" class="btn btn-primary text-white tect">Kembali</a>
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