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
            <div>
            <h6 class="card-title"> <i class="m-r-5 font-18 mdi mdi-package"></i> Table Packages</h6>
                    <div class="text-end upgrade-btn">
                        <a href="{{url('/package/create')}}" class="btn btn-primary text-white tect">Add Package</a>
                    </div>
                    <br>
                    <div class="row">
                        <!-- Column -->
                        @foreach ($packages as $package)
                        <div class="col-lg-3 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="{{asset('storage/'.$package->photo)}}" class="img-fluid" width="250"/>
                                        <hr>
                                        <h4 class="card-title m-t-10"><a href="{{ url('package/' . $package->id) }}">{{$package->name}}</a></h4>
                                        <input type="hidden" id="normal_price" name="normal_price" value="{{$package->normal_price}}">
                                        <h6 class="card-subtitle text-danger" id="normal_price_preview"><s>Rp.{{$package->normal_price}}</s></h6>
                                        <input type="hidden" id="end_price" name="end_price" value="{{$package->end_price}}">
                                        <h3 class="card-subtitle" id="end_price_preview">Rp.{{$package->end_price}}</h3>
                                        <td>
                                            <a href="{{ url('package/' . $package->id) }}"
                                                class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                            <a href="{{ url('package/' . $package->id . '/edit') }}"
                                                class="btn btn-primary btn-sm"><i class="mdi mdi-tooltip-edit"></i></a>
                                            <a onclick="return confirm('Apakah anda yakin untuk menghapus data package?')"
                                                href="{{ url('package/' . $package->id . '/delete') }}"
                                                class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </center>
                                </div>
                                <div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <script>

                            var x = document.getElementById("normal_price").value;
                            var y = document.getElementById("end_price").value;
                            
                            const rupiah = (number)=>{
                                return new Intl.NumberFormat("id-ID", {
                                  style: "currency",
                                  currency: "IDR"
                                }).format(number);
                              }
                                let old_value = rupiah(x);
                                let result = old_value.strike()
                                document.getElementById("normal_price_preview").innerHTML = result;
                                document.getElementById("end_price_preview").innerHTML = rupiah(y);
                            
                                </script>
                        @endforeach
                        {{$packages->links()}}
                    </div>
                </div>
            </div>
        </div>

@endsection

