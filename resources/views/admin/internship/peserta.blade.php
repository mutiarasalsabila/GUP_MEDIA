@extends('admin-layouts/main')
@section('title','Peserta Internship')

@section('main-content')

<div class="container-fluid" style="min-height: 768px; background-color: #EBEBEB;">
    <div class="row">
        
        @include('admin-layouts.sidebar')

        <div class="col-9 col-sm-10">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-start d-inline-block fw-bold pt-4 pb-3">Peserta Internship</h2>
                </div>
                <div class="col-6 text-end my-auto">
                    <h5>Total Peserta : <span class="badge text-dark" style="background-color: #EDD07F;">{{ $internship->count() }}</span></h5>
                </div>
            </div>
            <div class="row px-2">
                <div class="col-12">
                    @if(session('errors'))
                        <div class="alert alert-danger d-flex alert-dismissible mt-1">
                            Error:
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success d-flex alert-dismissible mt-1">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row table-responsive px-3">
                <table class="table table-bordered" style="background-color: #C4C4C4; border-color: lightgrey;">
                    <thead class="text-center text-nowrap">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Nama Internship</th>
                            <th scope="col">LinkedIn URL</th>
                            <th scope="col">Portfolio URL</th>
                            <th scope="col">Curriculum Vitae</th>
                            <th scope="col">Motivational Letter</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($internship as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->user->name }}</td>
                                <td>{{ $i->user->email }}</td>
                                <td>{{ $i->user->phone }}</td>
                                <td>{{ Str::limit($i->internship->name,10) }}</td>
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
                                <td>
                                    @if ($i->status == "Dalam Seleksi")
                                        <span class="badge bg-warning">
                                            {{ $i->status }}
                                        </span>
                                    @elseif ($i->status == "Diterima")
                                        <span class="badge bg-success">
                                            {{ $i->status }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            {{ $i->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center text-nowrap">
                                    <a href="" class="btn btn-sm" style="background-color: #F6E8BF;" data-bs-toggle="modal" data-bs-target="#modalShow{{ $i->id }}"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm" style="background-color: #F6E8BF;" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $i->id }}"><i class="fas fa-trash-alt"></i></a>
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

@foreach ($internship as $i)
    <div class="modal fade" id="modalShow{{ $i->id }}" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Detail Pendaftaran</h2>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Full Name</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $i->user->name }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Email</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $i->user->email }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Phone</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $i->user->phone }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Nama Internship</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $i->internship->name }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">LinkedIn URL</label>
                        </div>
                        <div class="col-8">
                            <a href="{{ $i->linkedin }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fab fa-sm fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Portfolio URL</label>
                        </div>
                        <div class="col-8">
                            <a href="{{ $i->portfolio }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fas fa-sm fa-tasks"></i></a>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Curriculum Vitae</label>
                        </div>
                        <div class="col-8">
                            <a href="{{ route('getCV',$i->cv) }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fas fa-sm fa-file-alt"></i></a>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Motivational Letter</label>
                        </div>
                        <div class="col-8">
                            <a href="{{ route('getML',$i->motivational_letter) }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fas fa-sm fa-envelope-open-text"></i></a>
                        </div>
                    </div>
                    <div class="row mb-3 mt-2 justify-content-center">
                        <div class="col-4">
                            <label class="form-label" for="name">Status</label>
                        </div>
                        <div class="col-8">
                            @if ($i->status == "Dalam Seleksi")
                                <span class="badge bg-warning">
                                    {{ $i->status }}
                                </span>
                            @elseif ($i->status == "Diterima")
                                <span class="badge bg-success">
                                    {{ $i->status }}
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    {{ $i->status }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 mt-3 justify-content-center">
                        <hr>
                        <p class="text-center">Ubah Status?</p>
                        <div class="col-6">
                            <a href="{{ route('admin.internship.peserta.decline', $i->id) }}" class="btn btn-md btn-outline-danger float-end rounded-pill mx-auto {{ ($i->status == "Ditolak") ? 'disabled' : '' }}">Tolak</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.internship.peserta.approve', $i->id) }}" class="btn btn-md btn-outline-success float-start rounded-pill mx-auto {{ ($i->status == "Diterima") ? 'disabled' : '' }}">Terima</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($internship as $i)
    <div class="modal fade" id="modalDelete{{ $i->id }}" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Hapus Data</h2>
                    <div class="row mb-3 mt-3 justify-content-center">
                        <p>Anda yakin ingin menghapus data ini?</p>
                        <div class="col-6">
                            <a href="" class="btn btn-md btn-outline-danger float-end rounded-pill mx-auto" data-bs-dismiss="modal">Batal</a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('admin.internship.peserta.destroy', $i->id) }}"  method="GET">
                                <input type="submit" class="btn btn-md btn-outline-success float-start rounded-pill mx-auto" value="Hapus">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection