@extends('layout.master')

@section('title')
Add Movie
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Add Movie
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
                        <h4 id="title" class="card-title m-t-10">Title</h4>
                        <h6 id="year_preview" class="card-subtitle">Year</h6>
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
                    <form class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data" action="{{ route('movie.store') }}">
                        @csrf 
                        <div class="form-group">
                            <label class="col-md-12">Movie Title</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('movie_name') is-invalid @enderror" id="movie_name" name="movie_name" value="{{ old('movie_name') }}" onchange="previewTitle()">
                                @error('movie_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="year" class="col-md-12">Year</label>
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control form-control-line  @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}"
                                    id="year" onchange="previewYear()">
                                @error('year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Duration</label>
                            <div class="col-md-12">
                                <input type="text" 
                                    class="form-control form-control-line  @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration') }}" placeholder="Minutes">
                                    @error('duration')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Country</label>
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control form-control-line  @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}">
                                    @error('country')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line  @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Poster</label>
                                <input class="form-control form-control-lg @error('poster') is-invalid @enderror" id="poster" name="poster" type="file" onchange="previewImage(event)">
                                @error('poster')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Add Movie</button>
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
        var x = document.getElementById("movie_name").value;
        document.getElementById("title").innerHTML = x;
    }

    function previewYear() {
        var x = document.getElementById("year").value;
        document.getElementById("year_preview").innerHTML = x;
    }

</script>

@endsection