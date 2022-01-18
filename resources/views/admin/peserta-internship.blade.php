@extends('admin-layouts/main')
@section('title','Data Internship')

@section('main-content')

<div class="container-fluid">
    <div class="row">
        
        @include('admin-layouts.sidebar')

        <div class="col-9 col-sm-10" style="background-color: #EBEBEB;">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-start d-inline-block fw-bold pt-4 pb-3">Peserta Internship</h2>
                </div>
                <div class="col-6 text-end my-auto">
                    <h5>Total Peserta : <span class="badge text-dark" style="background-color: #EDD07F;">{{ $intern->count() }}</span></h5>
                </div>
            </div>
            <div class="row table-responsive px-3">
                <table class="table table-bordered" style="background-color: #C4C4C4; border-color: lightgrey;">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">LinkedIn URL</th>
                            <th scope="col">Portfolio URL</th>
                            <th scope="col">Curriculum Vittae</th>
                            <th scope="col">Motivational Letter</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($intern as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->user->name }}</td>
                                <td>{{ $i->user->email }}</td>
                                <td>{{ $i->phone }}</td>
                                <td class="text-center">
                                    <a href="{{ $i->linkedin }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fab fa-sm fa-linkedin"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ $i->portfolio }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fas fa-sm fa-tasks"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('getCV',$i->cv) }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fas fa-sm fa-file-alt"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('getML',$i->motivational_letter) }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fas fa-sm fa-envelope-open-text"></i></a>
                                </td>
                                @if ($i->status == "Dalam Pengecekan")
                                    <td>
                                        <span class="badge bg-warning">
                                            {{ $i->status }}
                                        </span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-success">
                                            {{ $i->status }}
                                        </span>
                                    </td>

                                @endif
                                <td class="text-center">
                                    <a href="" class="btn btn-sm" style="background-color: #F6E8BF;" data-bs-toggle="modal" data-bs-target="#modalShow{{ $i->id }}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /FORM PENDAFTARAN-->


@endsection