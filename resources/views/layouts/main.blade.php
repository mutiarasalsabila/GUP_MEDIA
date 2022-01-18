{{-- header --}}
@include('layouts/header')
{{-- end of header --}}

{{-- header --}}
@include('layouts/topbar')
{{-- end of header --}}

{{-- main content --}}
@yield('main-content')
{{-- end of main content --}}

{{-- modal login --}}
@include('layouts/modal-login')
{{-- end of mogal login --}}

{{-- modal register --}}
@include('layouts/modal-register')
{{-- end of modal register --}}

{{-- modal register --}}
@include('layouts/modal-post-daftar')
{{-- end of modal register --}}

{{-- footer --}}
@include('layouts/footer')
{{-- end of footer --}}