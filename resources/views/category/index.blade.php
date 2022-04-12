@extends('layout.master')

@section('title')
Category Master
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Category Master
        @endslot
@endcomponent

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"> <i class="m-r-5 font-18 mdi mdi-category"></i>Table Categories</h6>
                    <div class="text-end upgrade-btn">
                        <a href="{{url('/category/create')}}" class="btn btn-primary text-white tect">Add Category</a>
                    </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $category->name }}</td>
=                            <td>
                                <a href="{{ url('category/' . $category->id) }}"
                                    class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                <a href="{{ url('category/' . $category->id . '/edit') }}"
                                    class="btn btn-primary btn-sm"><i class="mdi mdi-tooltip-edit"></i></a>
                                <a onclick="return confirm('Apakah anda yakin untuk menghapus data category?')"
                                    href="{{ url('category/' . $category->id . '/delete') }}"
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

@endsection

