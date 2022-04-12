@extends('layout.master')

@section('title')
Add Product
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Add Product
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
                        <h4 id="title" class="card-title m-t-10">Game Title</h4>
                        <h6 id="category_preview" class="card-subtitle">Category</h6>
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
                    <form class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
                        @csrf 
                        <div class="form-group">
                            <label class="col-md-12">Game Title</label>
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
                            <label class="col-md-12">Category</label>
                            <div class="col-md-12">
                                <select
                                    class="form-select form-select-line  @error('id_category') is-invalid @enderror" id="id_category" name="id_category" value="{{ old('id_category') }}" onchange="previewCategory()">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @endforeach
                                </select>
                                    @error('id_category')
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
                                <button class="btn btn-success text-white">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->

<script>

var previewImage = function(event) {
    var output = document.getElementById('poster_preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };

  function previewTitle() {
        var x = document.getElementById("name").value;
        document.getElementById("title").innerHTML = x;
    }

    function previewCategory() {
        var x = document.getElementById("id_category").value;
        document.getElementById("category_preview").innerHTML = x;
    }

</script>

@endsection