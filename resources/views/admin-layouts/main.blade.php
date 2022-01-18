{{-- header --}}
@include('layouts/header')
{{-- end of header --}}

{{-- topbar --}}
@include('admin-layouts/topbar')
{{-- end of topbar --}}

{{-- main content --}}
@yield('main-content')
{{-- end main content --}}

{{-- footer --}}
@include('layouts/footer')
{{-- enf of footer --}}