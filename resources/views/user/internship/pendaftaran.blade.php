@extends('layouts/main')
@section('title','Pendaftaran Internship')

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
                    <h2 class="text-center fw-bold pt-4 pb-4"> Form Pendaftaran Internship</h2>
                    @if (Session::has('error'))
                        <div class="alert alert-danger d-flex alert-dismissible mt-1">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('internship.pendaftaran.store') }}" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="cv">Resume/CV</label>
                            </div>
                            <div class="col-8">
                                <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" id="cv" value="{{ old('cv') }}">
                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
                                <label class="form-label" for="internship_id">Program Internship</label>
                            </div>
                            <div class="col-8">
                                <textarea class="form-control" readonly>{{ $internship->name }}</textarea>
                                <input type="text" name="internship_id" id="internship_id" class="form-control" value="{{ $internship->id }}" hidden>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label class="form-label" for="linkedin">LinkedIn URL</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" id="linkedin" value="{{ old('linkedin') }}">
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label for="portfolio" class="form-label">Portfolio URL</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control @error('portfolio') is-invalid @enderror" name="portfolio" id="portfolio" value="{{ old('portfolio') }}">
                                @error('portfolio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-4">
                                <label for="motivational_letter" class="form-label">Motivation Letter</label>
                            </div>
                            <div class="col-8">
                                <input type="file" class="form-control @error('motivational_letter') is-invalid @enderror" name="motivational_letter" id="motivational_letter" value="{{ old('motivational_letter') }}">
                                @error('motivational_letter')
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