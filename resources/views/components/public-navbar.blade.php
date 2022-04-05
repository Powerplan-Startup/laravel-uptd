<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
        <li><a class="nav-link scrollto" href="/blog">Berita</a></li>
        <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="visimisi">Visi dan Misi</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="#">Data Calon Peserta Pelatihan</a></li>
                <li><a href="#">Data Peserta Pelatihan</a></li>
                <li><a href="instruktur">Data Instruktur</a></li>
                <li><a href="kejuruan">Data Kejuruan</a></li>
                <li><a href="#">Data Jadwal Pelatihan</a></li>
            </ul>
        </li>
        <li><a class="nav-link scrollto" href="/alumni">Penempatan</a></li>
        @auth
            <li class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard" target="_blank"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
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
            <li class="nav-link">
                <a class="nav-link px-3" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
        @endauth
        @auth('admin')
            <li class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth('admin')->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard" target="_blank"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
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
            <li class="nav-link">
                <a class="nav-link px-3" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
        @endauth
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
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li> --}}
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->