@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <div class="content-body" style="min-height: 788px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white"></h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"></h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white" href="{{ url('/pegawai') }}">Jumlah Pegawai</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $pegawai }}</h2>
                                    <p class="text-white mb-0">Jan - March 2023</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
