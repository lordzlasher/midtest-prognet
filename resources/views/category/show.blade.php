@extends('layout.master')

@section('title')
Category Detail
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Category Detail
        @endslot
@endcomponent


    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group">
                            <label class="col-md-12">Category Name</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$category->name}}""
                                    class="form-control form-control-line" id="name" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{url('/category')}}" class="btn btn-primary text-white tect">Back</a>
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