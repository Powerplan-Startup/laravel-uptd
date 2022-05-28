<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li><a class="nav-link page-scroll scrollto active" href="/">Beranda</a></li>
        <li><a class="nav-link page-scroll scrollto" href="/blog">Berita</a></li>
        {{-- <li class="dropdown"><a href="#"><span>Berita</span> <i class="bi bi-chevron-down"></i></a> --}}
            {{-- <ul> --}}
                {{-- <li><a href="/blog">Infromasi Lolos Seleksi</a></li> --}}
                {{-- <li><a href="/jadwal">Jadwal Pelatihan</a></li> --}}
            {{-- </ul> --}}
        {{-- </li> --}}
        <li class="dropdown"><a href="/visimisi"><span>Profil</span></a></li>
        {{-- TODO: salah desain interface --}}
        {{-- <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="/calonpeserta">Data Calon Peserta Pelatihan</a></li>
                <li><a href="/peserta">Data Peserta Pelatihan</a></li>
                <li><a href="/instruktur">Data Instruktur</a></li>
                <li><a href="/kejuruan">Data Kejuruan</a></li>
                <li><a href="/jadwal-pelatihan">Data Jadwal Pelatihan</a></li>
            </ul>
        </li> --}}
        <li><a class="nav-link page-scroll scrollto" href="/alumni">Alumni</a></li>
        @if(auth()->check())
            <li class="dropdown">
            <a class="nav-link page-scroll dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Halo, {{ auth()->user()->nama }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('user.index') }}" target="_blank"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                    </form>
                </li>
            </ul>
            </li>
        @elseif(auth('admin')->check())
            <li class="dropdown">
                <a class="nav-link page-scroll dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Halo, {{ auth('admin')->user()->nama }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/admin" target="_blank"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        @else
            <li class="nav-link page-scroll">
                <a class="nav-link page-scroll px-3" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
        @endif
        {{-- <li><a href="blog.html">Blog</a></li>
        <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
            </ul>
        </li>
        <li><a class="nav-link page-scroll scrollto" href="#contact">Contact</a></li> --}}
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->