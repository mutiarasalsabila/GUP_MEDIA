@extends('admin-layouts/main')
@section('title','Dashboard')

@section('main-content')

<div class="container-fluid">
    <div class="row">

        @include('admin-layouts.sidebar')

        <div class="col-9 col-sm-10" style="background-color: #EBEBEB;">
            <div class="row px-3">
                <div class="col-6">
                    <h2 class="text-start d-inline-block fw-bold pt-4 pb-3">Dashboard</h2>
                </div>
                <div class="col-6 text-end my-auto">
                    <h6 class="text-muted">{{ now()->format('d F Y') }}</h6>
                </div>
            </div>
            <div class="row table-responsive px-3">
                <div class="col">
                    <div class="card pt-3 pb-3" style="background-color: #D1CACA; cursor: pointer;" onclick="location.href='{{ route('admin.webinar.peserta') }}'">
                        <h3 class="fw-bold text-center"> Total Peserta Webinar</h3>
                        <h1 class="fw-bold text-center">{{ $peserta_webinar }}</h1>
                    </div>
                </div>

                <div class="col">
                    <div class="card pt-3 pb-3" style="background-color: #D1CACA; cursor: pointer;" onclick="location.href='{{ route('admin.internship.peserta') }}'">
                        <h3 class="fw-bold text-center"> Total Peserta Internship</h3>
                        <h1 class="fw-bold text-center">{{ $peserta_internship }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection