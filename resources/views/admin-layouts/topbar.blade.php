<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand ms-4" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="" height="60">
            </a>

            <div class=" collapse navbar-collapse fw-bold" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-4">
                    <li class="nav-item my-auto">
                        <span class="mx-3 p-2 rounded" style="background-color: #EDD07F80;">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="btn nav-link py-2" style="background-color: #EDD07F80; color: black;">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>