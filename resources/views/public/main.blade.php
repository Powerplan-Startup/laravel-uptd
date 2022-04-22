<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UPTD Latihan Kerja Prov. NTT | {{ $title ?? null }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    @stack('head')

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center" style="background: rgba(17, 16, 22, 0.9); backdrop-filter: blur(1rem)">
        <div class="container d-flex justify-content-between">
            <div class="logo">
                <h1 class="fs-3 mt-3 h4">
					<a href="/">
						<div>
							<span>UPTD</span>
						</div>
						<div class="small h6" style="font-size: 1rem">
							Latihan Kerja Prov. NTT
						</div>
					</a>
				</h1>
            </div>
            @include('components.public-navbar')
        </div>
    </header>
    <section class="main-biru d-flex position-relative"
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
    </section>
    <main id="main">

        {{-- @include('components.public-main') --}}
        @yield('container')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('components.public-footer')
    <!-- End  Footer -->

    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
