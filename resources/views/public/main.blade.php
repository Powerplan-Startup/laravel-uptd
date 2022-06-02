<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UPTD Latihan Kerja Prov. NTT | {{ $title ?? null }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- =============== Bootstrap Core CSS =============== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!-- =============== fonts awesome =============== -->
    <link rel="stylesheet" href="assets/font/css/font-awesome.min.css" type="text/css">
    <!-- =============== Plugin CSS =============== -->
    <link rel="stylesheet" href="assets/css/animate.min.css" type="text/css">
    <!-- =============== Custom CSS =============== -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- =============== Owl Carousel Assets =============== -->
    <link href="assets/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/owl-carousel/owl.theme.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/isotope-docs.css" media="screen">
    <link rel="stylesheet" href="assets/css/baguetteBox.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @stack('head')

    <!-- Template Main CSS File -->

</head>

<body>
    @env('APP_PRELOAD')
        <!-- =============== Preloader =============== -->
        <div id="preloader">
            <div id="loading">
                <img width="256" height="32" src="assets/img/loading-cylon-red.svg">
            </div>
        </div>
    @endenv
    <!-- =============== nav =============== -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand text-white" href="{{ route('home') }}" style="line-height: 105px; color: white">
                        <span>UPTD</span>
                    </a>
                </div>
                @include('components.public-navbar')
            </div>
        </div>
        <!-- =============== container-fluid =============== -->
    </nav>
    @if($full ?? false)
        <header id="home" class="header">
            <div class="container">
                <div class="header-content row">
                    <div id="owl-demo" class="owl-carousel header1">
                        <div>
                            <div class="col-xs-12 col-sm-6 col-md-6 header-text d-flex justify-content-center">
                                <div class="w-100" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: .4rem; grid-auto-rows: minmax(calc(180px / 2), 1fr)">
                                    @for ($i = 1; $i < 12; $i++)
                                        <div style="background-image: url('/assets/img/uptd/{{$i}}.jpg'); background-size: cover; {{ $i == 1 ? 'grid-row-end: span 3' : null }}"></div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-xs-12 col-sm-6 col-md-6 header-text">
                                <h2 class="wow bounceIn animated" data-wow-delay=".40s"><span>Daftar</span> Pelatihan</h2>
                                <p class="wow bounceIn animated" data-wow-delay=".60s" style="font-size: .75rem;">
                                    Persyaratan
                                    <span>
                                        Mengisi Form Pendaftaran, 
                                        Umur 18-38 tahun, KTP, Surat Keterangan Telah Menyelesaikan Studi dan Surat pernyataan bersedia menaati semua ketentuan yang berlaku (Disiapkan oleh penyelenggara)
                                    </span>
                                </p>
                                <p>
                                    <a href="/register" class="btn btn-primary btn-lg btn-ornge wow bounceIn animated" data-wow-delay="1s"><i
                                            class="hbtn"></i> <span>Mendaftar</span></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @else
        <header id="home" class="header" style="max-height: 250px">
            <div class="container">
                <div class="header-content row">
                </div>
            </div>
        </header>
    @endif

    <!-- ======= Header ======= -->
    {{-- <header id="header" class="fixed-top d-flex align-items-center" style="background: rgba(17, 16, 22, 0.9); backdrop-filter: blur(1rem)">
        <div class="container d-flex justify-content-between">
            <div class="logo">
                <h1 class="fs-3 mt-3 h4">
					<a href="/">
					</a>
				</h1>
            </div> --}}
    {{-- </div>
    </header> --}}
    {{-- <section class="main-biru d-flex position-relative"
        style="padding-top: 96px; {{ $full ?? false ? 'min-height: 90vh;' : '' }} background-image: linear-gradient(to top, rgba(27, 20, 9, 0.8) 10%, rgba(0, 0, 0, .25), rgb(167, 198, 245) 90%), url('/assets/img/uptd/Artboard1.jpg'); background-size: cover">
        <div class="position-absolute h-100 w-100 top-0 left-0" style="background: rgba(0, 0, 0, .75)"></div>
        <div class="container py-5" style="">
            <div class="row h-100">
                <div class="col-12">
                    <div class="h-100 d-flex flex-column justify-content-center p-5"
                        style="filter: drop-shadow(10px 5px 8px rgba(0, 0, 0, 1));">
                        <div>
                            <h1 class="mb-0 display-4 fw-bolder"
                                style="font-family: 'Catamaran', sans-serif; color: rgb(96, 204, 220); color: white">
                                UPTD Latihan Kerja
                            </h1>
                        </div>
                        <div>
                            <div class="fw-light" style="font-size: 2rem; opacity: .76">
                                Propinsi Nusa Tenggara Timur
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <main id="main">

        {{-- @include('components.public-main') --}}
        @yield('container')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('components.public-footer')
    <!-- End  Footer -->

    <!-- Footer -->
    
</body>

</html>
