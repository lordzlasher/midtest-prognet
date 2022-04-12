@extends('layout.master')

@section('title')
Product Edit
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Product Edit
        @endslot
@endcomponent

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <img id="poster_preview" src="{{asset('storage/'.$product->photo)}}" width="250"  />
                        <hr>
                        <h4 id="title" class="card-title m-t-10">{{$product->name}}</h4>
                        <h6 id="year_preview" class="card-subtitle">{{$product->categories->name}}</h6>
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
                    <form class="form-horizontal form-material mx-2" method="post" enctype="multipart/form-data" action="{{ route('product.update', $product) }}">
                        @csrf
                        @method('put')>
                        <div class="form-group">
                            <label class="col-md-12">Game Title</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('name') is-invalid @enderror" id="name" name="name" value="{{$product->name}}" onchange="previewTitle()">
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
                                    <option value="{{ $product->id_categories }}">{{ $product->categories->name }}
                                    </option>
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
                            <input type="hidden" name="oldImage" value="{{$product->photo}}">
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
                                <button class="btn btn-success text-white">Update Product</button>
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