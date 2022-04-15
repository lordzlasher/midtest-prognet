@extends('layout.master')

@section('title')
Package Master
@endsection

@section('content')

@component('components.breadcrumb')
        @slot('breadcrumb_title')
            Package Master
        @endslot
@endcomponent

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"> <i class="m-r-5 font-18 mdi mdi-gift"></i>Table package</h6>
            <a href="{{ url('package-list') }}"
                class="btn btn-sm"><i class="mdi mdi-format-list-bulleted"></i></a>
            <a href="{{ url('package') }}"
                class="btn btn-sm"><i class="mdi mdi-grid"></i></a>
                    <div class="text-end upgrade-btn">
                        <a href="{{url('/package/create')}}" class="btn btn-primary text-white tect">Add Package</a>
                    </div>
            <br>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Normal Price</th>
                            <th scope="col">End Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $package)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $package->name }}</td>
                            <input type="hidden" id="normal_price" name="normal_price" value="{{$package->normal_price}}">
                            <input type="hidden" id="end_price" name="end_price" value="{{$package->end_price}}">
                            <td id="normal_price_preview">{{ $package->normal_price }}</td>
                            <td id="end_price_preview">{{ $package->end_price }}</td>
                            <td>
                                <a href="{{ url('package/' . $package->id) }}"
                                    class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                <a href="{{ url('package/' . $package->id . '/edit') }}"
                                    class="btn btn-primary btn-sm"><i class="mdi mdi-tooltip-edit"></i></a>
                                <a onclick="return confirm('Apakah anda yakin untuk menghapus data package?')"
                                    href="{{ url('package/' . $package->id . '/delete') }}"
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

