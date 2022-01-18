@if (!empty(Session::get('code')) && Session::get('code') == "modalLogin")
    <script>
        $(function(){
            $('#modalLogin').modal('show');
        });
    </script>
@endif

<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-3" style="background-color: #C4C4C4; border-radius: 5%">
                <div class="modal-body">
                    <h2 class="text-center fw-bold p-3">Login</h2>
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
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="my-3">
                            <label for="email" class="fw-bold col-form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            <span class="text-muted">Contoh : email@telkomuniversity.ac.id</span>
                            @error('email')
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
                        <div class="mb-3 mt-4">
                            <input type="submit" class="btn btn-md btn-secondary more-info rounded-pill mx-auto d-block" style="background-color: #DBDBDB;" value="Login">
                        </div>
                        <p class="text-center">Belum punya akun? <a href="" data-bs-toggle="modal" data-bs-target="#modalRegister" class="fw-bold text-black text-decoration-none">Daftar</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>