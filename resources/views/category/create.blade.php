@extends('layout.master')

@section('title')
Add Category
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Add Category
        @endslot
@endcomponent

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data" action="{{ route('category.store') }}">
                        @csrf 
                        <div class="form-group">
                            <label class="col-md-12">Category Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Add Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->

@endsection