@if (!empty(Session::get('code')) && Session::get('code') == "modalRegister")
    <script>
        $(function(){
            $('#modalRegister').modal('show');
        });
    </script>
@endif

<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-3" style="background-color: #C4C4C4; border-radius: 5%">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Daftar</h2>
                    @if (Session::has('error'))
                        <div class="alert alert-danger d-flex alert-dismissible mt-1">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success d-flex alert-dismissible mt-1">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="my-3">
                            <label for="name" class="fw-bold col-form-label">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="email" class="fw-bold col-form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="phone" class="fw-bold col-form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="password" class="fw-bold col-form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="password_confirmation" class="fw-bold col-form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                        </div>
                        <div class="mb-3 mt-4">
                            <input type="submit" class="btn btn-md btn-secondary more-info rounded-pill mx-auto d-block" style="background-color: #DBDBDB;" value="Daftar">
                        </div>
                        <p class="text-center">Sudah punya akun? <a href="" data-bs-toggle="modal" data-bs-target="#modalLogin" class="fw-bold text-black text-decoration-none">Masuk</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>