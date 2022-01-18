<div class="col-3 col-sm-2 d-flex flex-column flex-shrink-0 p-3 text-black " style="min-height: 768px; background-color: #F6E8BF;">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin')) ? 'text-black' : 'text-muted' }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.internship.peserta') }}" class="nav-link {{ (request()->is('admin/internship/peserta*')) ? 'text-black' : 'text-muted' }}">
                        Peserta Internship
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.webinar.peserta') }}" class="nav-link {{ (request()->is('admin/webinar/peserta*')) ? 'text-black' : 'text-muted' }}">
                        Peserta Webinar
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.internship.division') }}" class="nav-link {{ (request()->is('admin/internship/division*')) ? 'text-black' : 'text-muted' }}">
                        Divisi Internship
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.internship.subdivision') }}" class="nav-link {{ (request()->is('admin/internship/subdivision*')) ? 'text-black' : 'text-muted' }}">
                        Subdivisi Internship
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.webinar.data') }}" class="nav-link {{ (request()->is('admin/webinar/data*')) ? 'text-black' : 'text-muted' }}">
                        Data Webinar
                    </a>
                </li>
            </ul>
        </div>