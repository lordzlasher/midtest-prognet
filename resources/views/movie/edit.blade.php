@extends('layout.master')

@section('title')
Movie Edit
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Movie Edit
        @endslot
@endcomponent

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <img id="poster_preview" src="{{asset('storage/'.$movies->poster)}}" width="250"  />
                        <hr>
                        <h4 id="title" class="card-title m-t-10">{{$movies->movie_name}}</h4>
                        <h6 id="year_preview" class="card-subtitle">{{$movies->year}}</h6>
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
                    <form class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data" action="{{ route('movie.update', $movies) }}">
                        @csrf
                        @method('put')>
                        <div class="form-group">
                            <label class="col-md-12">Movie Title</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$movies->movie_name}}" class="form-control form-control-line" id="movie_name" name="movie_name" onchange="previewTitle()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="year" class="col-md-12">Year</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$movies->year}}"
                                    class="form-control form-control-line" name="year"
                                    id="year" onchange="previewYear()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Duration</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$movies->duration}}"
                                    class="form-control form-control-line" id="duration" name="duration">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Country</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$movies->country}}"
                                    class="form-control form-control-line" id="country" name="country">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line" id="description" name="description">{{$movies->description}}</textarea>
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
                                <button class="btn btn-success text-white">Update Movie</button>
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