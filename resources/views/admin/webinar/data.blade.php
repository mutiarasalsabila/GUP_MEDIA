@extends('admin-layouts/main')
@section('title','Data Webinar')

@section('main-content')

<div class="container-fluid" style="min-height: 768px; background-color: #EBEBEB;">
    <div class="row">
        
        @include('admin-layouts.sidebar')

        {{-- show all data --}}
        <div class="col-9 col-sm-10">
            <div class="row px-2">
                <div class="col-6">
                    <h3 class="text-start d-inline-block fw-bold pt-4">Webinar</h3>
                </div>
                <div class="col-6 text-end my-auto">
                    <h5>Total : <span class="badge text-dark" style="background-color: #EDD07F;">{{ $webinar->count() }}</span></h5>
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
                            <th scope="col">Speaker</th>
                            <th scope="col">Timeline</th>
                            <th scope="col">Icon Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($webinar as $w)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $w->name }}</td>
                                <td>{{ $w->speaker }}</td>
                                <td>{{ $w->timeline->format('d F Y') }}</td>
                                <td>{{ $w->icon }}</td>
                                <td class="text-center text-nowrap">
                                    <a href="" class="btn btn-sm" style="background-color: #F6E8BF;" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $w->id }}"><i class="fas fa-edit"></i></a>
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
{{-- end of show all data --}}

{{-- modal add data --}}
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Add Webinar</h2>
                    <form method="POST" action="{{ route('admin.webinar.data.store') }}" enctype="multipart/form-data">
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
                                <label class="form-label" for="speaker">Speaker</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control @error('speaker') is-invalid @enderror" name="speaker" id="speaker" value="{{ old('speaker') }}">
                                @error('speaker')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="timeline">Timeline</label>
                            </div>
                            <div class="col-8">
                                <input type="date" class="form-control @error('timeline') is-invalid @enderror" name="timeline" id="timeline" value="{{ old('timeline') }}">
                                @error('timeline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="inpFile">Icon Image</label>
                            </div>
                            <div class="col-8">
                                <input type="file" accept="image/*" id="inpFile" class="form-control mb-2 @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}">
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img id="iconPreview" src="" alt="preview" style="max-height: 15rem; max-width:15rem; display:none;"/>
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
@foreach ($webinar as $w)
    <div class="modal fade" id="modalEdit{{ $w->id }}" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Edit Webinar</h2>
                    <form method="POST" action="{{ route('admin.webinar.data.update',$w->id) }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="name">Name</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="id" id="id" value="{{ $w->id }}" hidden>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $w->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="speaker">Speaker</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control @error('speaker') is-invalid @enderror" name="speaker" id="speaker" value="{{ $w->speaker }}">
                                @error('speaker')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="timeline">Timeline</label>
                            </div>
                            <div class="col-8">
                                <input type="date" class="form-control @error('timeline') is-invalid @enderror" name="timeline" id="timeline" value="{{ $w->timeline }}">
                                @error('timeline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="inpFile">Icon Image</label>
                            </div>
                            <div class="col-8">
                                <input type="file" accept="image/*" id="inpFile{{ $w->id }}" class="form-control mb-2 @error('icon') is-invalid @enderror" name="icon" value="{{ $w->icon }}">
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img id="iconPreview{{ $w->id }}" src="{{ asset('storage/webinar-icon/'.$w->icon) }}"  alt="preview" style="max-height: 15rem; max-width:15rem;"/>
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
@foreach ($webinar as $w)
    <div class="modal fade" id="modalDelete{{ $w->id }}" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-4" style="background-color: #C4C4C4; border-radius: 5px">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Hapus Data</h2>
                    <div class="row mb-3 mt-3 justify-content-center">
                        <p>Anda yakin ingin menghapus Webinar <strong>{{ $w->name }}</strong>?</p>
                        <div class="col-6">
                            <a href="" class="btn btn-md btn-outline-danger float-end rounded-pill mx-auto" data-bs-dismiss="modal">Batal</a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('admin.webinar.data.destroy', $w->id) }}"  method="GET">
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

<script>
    const inpFile = document.getElementById("inpFile");
    const iconPrev = document.getElementById("iconPreview");

    inpFile.addEventListener("change",function(){
        const file = this.files[0];

        if(file){
            const reader = new FileReader();

            reader.addEventListener("load",function(){
                iconPrev.style.display = "block";
                iconPrev.setAttribute("src",this.result);
            });
            reader.readAsDataURL(file);
        }
    });
</script>

@foreach ($webinar as $w)
    <script>
        const inpFile = document.getElementById("inpFile{{ $w->id }}");
        const iconPrev = document.getElementById("iconPreview{{ $w->id }}");

        inpFile.addEventListener("change",function(){
            const file = this.files[0];

            if(file){
                const reader = new FileReader();

                reader.addEventListener("load",function(){
                    iconPrev.setAttribute("src",this.result);
                });
                reader.readAsDataURL(file);
            }
        });
    </script>
@endforeach
@endsection