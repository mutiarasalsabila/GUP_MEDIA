@extends('admin-layouts/main')
@section('title','Peserta Webinar')

@section('main-content')

<div class="container-fluid" style="min-height: 768px; background-color: #EBEBEB;">
    <div class="row">
        
        @include('admin-layouts.sidebar')

        <div class="col-9 col-sm-10">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-start d-inline-block fw-bold pt-4 pb-3">Peserta Webinar</h2>
                </div>
                <div class="col-6 text-end my-auto">
                    <h5>Total Peserta : <span class="badge text-dark" style="background-color: #EDD07F;">{{ $webinar->count() }}</span></h5>
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
                            <th scope="col">ID Line</th>
                            <th scope="col">Nama Webinar</th>
                            <th scope="col">Alasan Mengikuti Webinar</th>
                            <th scope="col">Bukti Follow Instagram Gupmedia.id</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($webinar as $w)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $w->user->name }}</td>
                                <td>{{ $w->user->email }}</td>
                                <td>{{ $w->user->phone }}</td>
                                <td>{{ $w->id_line }}</td>
                                <td>{{ Str::limit($w->webinar->name,10) }}</td>
                                <td>{{ Str::limit($w->alasan,10) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('getBukti',$w->bukti_follow) }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fas fa-sm fa-file-alt"></i></a>
                                </td>
                                <td class="text-center text-nowrap">
                                    <a href="" class="btn btn-sm" style="background-color: #F6E8BF;" data-bs-toggle="modal" data-bs-target="#modalShow{{ $w->id }}"><i class="fas fa-info"></i></a>
                                    <a href="" class="btn btn-sm" style="background-color: #F6E8BF;" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $w->id }}"><i class="fas fa-trash-alt"></i></a>
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


@foreach ($webinar as $w)
    <div class="modal fade" id="modalShow{{ $w->id }}" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Detail Pendaftaran</h2>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Full Name</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $w->user->name }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Email</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $w->user->email }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Phone</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $w->user->phone }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">ID Line</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $w->id_line }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Nama Webinar</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $w->webinar->name }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Alasan</label>
                        </div>
                        <div class="col-8">
                            <p class="fw-bold">{{ $w->alasan }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-4">
                            <label class="form-label" for="name">Bukti Follow IG</label>
                        </div>
                        <div class="col-8">
                            <a href="{{ route('getBukti',$w->bukti_follow) }}" class="btn btn-sm" style="background-color: #F6E8BF;">Open <i class="fas fa-sm fa-file-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($webinar as $w)
    <div class="modal fade" id="modalDelete{{ $w->id }}" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
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
                            <form action="{{ route('admin.webinar.peserta.destroy', $w->id) }}"  method="GET">
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