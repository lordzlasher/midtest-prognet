@extends('layout.master')

@section('title')
Product Master
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Product Master
        @endslot
@endcomponent

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"> <i class="m-r-5 font-18 mdi mdi-gift"></i>Table Product</h6>
            <a href="{{ url('product/') }}"
            class="btn btn-sm"><i class="mdi mdi-format-list-bulleted"></i></a>
            <a href="{{ url('product-grid') }}"
            class="btn btn-sm"><i class="mdi mdi-grid"></i></a>
                    <div class="text-end upgrade-btn">
                        <a href="{{url('/product/create')}}" class="btn btn-primary text-white tect">Add Product</a>
                    </div>
            <br>
            <div class="row">
                <!-- Column -->
                @foreach ($products as $product)
                <div class="col-lg-3 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30">
                            <div class="card-body">
                                 <img src="{{asset('storage/'.$product->photo)}}" class="img-fluid"/>
                                </div>
                                <hr>
                                <h4 class="card-title m-t-10"><a href="{{ url('product/' . $product->id) }}">{{$product->name}}</a></h4>
                                <h6 class="card-subtitle">{{$product->publisher}}</h6>
                                <hr>
                                    <a href="{{ url('product/' . $product->id) }}"
                                        class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                    <a href="{{ url('product/' . $product->id . '/edit') }}"
                                        class="btn btn-primary btn-sm"><i class="mdi mdi-tooltip-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus data package?')"
                                        href="{{ url('product/' . $product->id . '/delete') }}"
                                        class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </center>
                        </div>
                        <div>
                            <hr>
                        </div>
                    </div>
                </div>
                @endforeach
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>

@endsection

