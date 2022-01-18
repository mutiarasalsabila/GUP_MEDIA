@extends('admin-layouts/main')
@section('title','Data Subdivisi Internship')

@section('main-content')

<div class="container-fluid" style="min-height: 768px; background-color: #EBEBEB;">
    <div class="row">
        
        @include('admin-layouts.sidebar')

        {{-- show all data --}}
        <div class="col-9 col-sm-10">
            <div class="row px-2">
                <div class="col-6">
                    <h3 class="text-start d-inline-block fw-bold pt-4">Subdivisi Internship</h3>
                </div>
                <div class="col-6 text-end my-auto">
                    <h5>Total : <span class="badge text-dark" style="background-color: #EDD07F;">{{ $internship->count() }}</span></h5>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-12">
                    <a href="" class="btn btn-sm mx-2 fw-bold" style="background-color: #EDD07F;" data-bs-toggle="modal" data-bs-target="#modalAdd">Add Data</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Internship Division</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($internship as $intern)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $intern->name }}</td>
                                <td>{{ $intern->internshipDivision->name }}</td>
                                <td>{{ Str::limit($intern->description,20) }}</td>
                                <td class="text-center text-nowrap">
                                    <a href="" class="btn btn-sm" style="background-color: #F6E8BF;" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $intern->id }}"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm" style="background-color: #F6E8BF;" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $intern->id }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- end of show all data --}}

{{-- modal add data --}}
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Add Subdivisi Internship</h2>
                    <form method="POST" action="{{ route('admin.internship.subdivision.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="name">Name</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="inpFile">Internship Division</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control text-wrap @error('internship_division_id') is-invalid @enderror" name="internship_division_id" id="internship_division_id">
                                    <option value="" hidden selected>--- Select ---</option>
                                    @foreach ($internship_division as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                                @error('internship_division_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="inpFile">Description</label>
                            </div>
                            <div class="col-8">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-3 justify-content-center">
                            <hr>
                            <div class="col-6">
                                <a href="" class="btn btn-md btn-outline-danger float-end rounded-pill mx-auto" data-bs-dismiss="modal">Batal</a>
                            </div>
                            <div class="col-6">
                                <input type="submit" class="btn btn-md btn-outline-success float-start rounded-pill mx-auto" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- end of modal add data --}}

{{-- modal edit data --}}
@foreach ($internship as $intern)
    <div class="modal fade" id="modalEdit{{ $intern->id }}" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Edit Subdivisi Internship</h2>
                    <form method="POST" action="{{ route('admin.internship.subdivision.update',$intern->id) }}">
                    @csrf
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="name">Name</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="id" id="id" value="{{ $intern->id }}" hidden>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $intern->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="name">Internship Division</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control text-wrap @error('internship_division_id') is-invalid @enderror" name="internship_division_id" id="internship_division_id">
                                    <option value="{{ $intern->internshipDivision->id }}" hidden selected>{{ $intern->internshipDivision->name }}</option>
                                    @foreach ($internship_division as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                                @error('internship_division_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="name">Description</label>
                            </div>
                            <div class="col-8">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $intern->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-3 justify-content-center">
                            <hr>
                            <div class="col-6">
                                <a href="" class="btn btn-md btn-outline-danger float-end rounded-pill mx-auto" data-bs-dismiss="modal">Batal</a>
                            </div>
                            <div class="col-6">
                                <input type="submit" class="btn btn-md btn-outline-success float-start rounded-pill mx-auto" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{-- end of modal edit data --}}

{{-- modal delete data --}}
@foreach ($internship as $intern)
    <div class="modal fade" id="modalDelete{{ $intern->id }}" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Hapus Data</h2>
                    <div class="row mb-3 mt-3 justify-content-center">
                        <p>Anda yakin ingin menghapus Subdivisi Internship <strong>{{ $intern->name }}</strong>?</p>
                        <div class="col-6">
                            <a href="" class="btn btn-md btn-outline-danger float-end rounded-pill mx-auto" data-bs-dismiss="modal">Batal</a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('admin.internship.subdivision.destroy', $intern->id) }}"  method="GET">
                                <input type="submit" class="btn btn-md btn-outline-success float-start rounded-pill mx-auto" value="Hapus">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{-- end of modal delete data --}}
@endsection