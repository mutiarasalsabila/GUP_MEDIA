@extends('layouts/main')
@section('title','Pendaftaran Webinar')

@section('main-content')

<div class="container-fluid">
    <!-- GUP MEDIA WEBINAR PROGRAM -->
    <div class="col position-relative">
        <div class="row pt-3 justify-content-center background-header">
            <div class="col-2">
                <img src="{{ asset('img/suci.png') }}" alt="Logo" height="150" class="mx-auto d-block">
            </div>
            <div class="col-2">
                <img src="{{ asset('img/muti.png') }}" alt="Logo" height="150" class="mx-auto d-block">
            </div>
            <div class="col-2">
                <img src="{{ asset('img/achmad.png') }}" alt="Logo" height="150" class="mx-auto d-block">
            </div>
            <div class="col-2">
                <img src="{{ asset('img/kanza.png') }}" alt="Logo" height="150" class="mx-auto d-block">
            </div>
        </div>
        <div class="text-center position-absolute top-0 h-100 w-100 d-flex flex-column align-items-center">
            <div class="text my-auto">
                <h1 class="m-0 fw-bold text-uppercase">JOIN US!</h1>
                <h2 class="text-uppercase">#Bantukamujadigrowupmaksimal!</h2>
            </div>
        </div>
    </div>
    <!-- /GUP MEDIA WEBINAR PROGRAM -->

    <!-- /FORM PENDAFTARAN-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                
    <div class="card-sm px-5 mt-5 pb-3" style="background-color: #C4C4C4; border-radius: 5%">
        <h2 class="text-center fw-bold pt-4 pb-4"> Form Pendaftaran Webinar</h2>
        @if (Session::has('error'))
            <div class="alert alert-danger d-flex alert-dismissible mt-1">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('webinar.pendaftaran.store') }}" enctype="multipart/form-data">
        @csrf
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
            <div class="row justify-content-center mt-2 mb-3">
                <div class="col-4">
                    <label class="form-label" for="name">Full Name</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                </div>
            </div>
            <div class="row justify-content-center mt-2 mb-3">
                <div class="col-4">
                    <label class="form-label" for="email">Email</label>
                </div>
                <div class="col-8">
                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                </div>
            </div>
            <div class="row justify-content-center mt-2 mb-3">
                <div class="col-4">
                    <label class="form-label" for="phone">Phone</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{ Auth::user()->phone }}" readonly>
                </div>
            </div>
            <div class="row justify-content-center mt-2 mb-3">
                <div class="col-4">
                    <label class="form-label" for="webinar_id">Program Webinar</label>
                </div>
                <div class="col-8">
                    <textarea class="form-control" readonly>{{ $webinar->name }}</textarea>
                    <input type="text" name="webinar_id" id="webinar_id" class="form-control" value="{{ $webinar->id }}" hidden>
                </div>
            </div>
            <div class="row justify-content-center mt-2 mb-3">
                <div class="col-4">
                    <label class="form-label" for="id_line">ID Line</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control @error('id_line') is-invalid @enderror" name="id_line" id="id_line" value="{{ old('id_line') }}">
                    @error('id_line')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-center mt-2 mb-3">
                <div class="col-4">
                    <label for="alasan" class="form-label">Alasan Mengikuti Webinar</label>
                </div>
                <div class="col-8">
                    <textarea class="form-control @error('alasan') is-invalid @enderror" name="alasan" id="alasan">{{ old('alasan') }}</textarea>
                    @error('alasan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-center mt-2 mb-3">
                <div class="col-4">
                    <label class="form-label" for="bukti_follow">Bukti Follow Instagram gupmedia.id</label>
                </div>
                <div class="col-8">
                    <input type="file" class="form-control @error('bukti_follow') is-invalid @enderror" name="bukti_follow" id="bukti_follow" value="{{ old('bukti_follow') }}">
                    @error('bukti_follow')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    </div>
    
    </div>
    
    </div>
    
    </div>
    <input type="submit" value="SUBMIT" class="btn mb-5 btn-lg btn-secondary more-info rounded-pill mx-auto d-block mt-4">
    </form>
</div>
<!-- /FORM PENDAFTARAN-->


@endsection