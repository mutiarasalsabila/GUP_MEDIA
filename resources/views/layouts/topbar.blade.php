<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand ms-4" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="" height="60">
            </a>

            <div class=" collapse navbar-collapse fw-bold" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-4">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('internship*')) ? 'active' : '' }}" href="{{ route('internship') }}">Internship</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('webinar*')) ? 'active' : '' }}" href="{{ route('webinar') }}">Webinar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('contact-us*')) ? 'active' : '' }}" href="{{ route('contact-us') }}">Contact Us</a>
                    </li>

                    @if (Auth::check())
                        @if (Auth::user()->level == "user")
                        <li class="nav-item">
                            <a href="{{ route('notifikasi') }}" class="position-relative nav-link fs-5 {{ (request()->is('notifikasi*')) ? 'active' : '' }}">
                                <i class="far fa-bell fa-fw mt-0"></i>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600 text-capitalize">
                                    <strong>
                                        {{ Auth::user()->name }}
                                    </strong>
                                </span>
                                <i class="fas fa-user fa-fw"></i>
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-dark dropdown-menu-right ml-0 shadow animated--grow-in" aria-labelledby="userDropdown">

                                {{-- perkondisian user level --}}

                                {{-- <hr class="dropdown-divider w-100"> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    Log Out
                                </a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>