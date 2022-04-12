@extends('layout.master')

@section('title')
Movie Master
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Movie Master
        @endslot
@endcomponent

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"> <i class="m-r-5 font-18 mdi mdi-movie"></i> Table Film</h6>
                    <div class="text-end upgrade-btn">
                        <a href="{{url('/movie/create')}}" class="btn btn-primary text-white tect">Add Film</a>
                    </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Movie Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $movie->movie_name }}</td>
                            <td>{{ $movie->year }}</td>
                            <td>
                                <a href="{{ url('movie/' . $movie->id) }}"
                                    class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                <a href="{{ url('movie/' . $movie->id . '/edit') }}"
                                    class="btn btn-primary btn-sm"><i class="mdi mdi-tooltip-edit"></i></a>
                                <a onclick="return confirm('Apakah anda yakin untuk menghapus data film?')"
                                    href="{{ url('movie/' . $movie->id . '/delete') }}"
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

