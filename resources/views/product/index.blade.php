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
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Year</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->publisher }}</td>
                            <td>{{ $product->year }}</td>
                            <td>
                                <a href="{{ url('product/' . $product->id) }}"
                                    class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                <a href="{{ url('product/' . $product->id . '/edit') }}"
                                    class="btn btn-primary btn-sm"><i class="mdi mdi-tooltip-edit"></i></a>
                                <a onclick="return confirm('Apakah anda yakin untuk menghapus data product?')"
                                    href="{{ url('product/' . $product->id . '/delete') }}"
                                    class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

@endsection

