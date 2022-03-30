<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UPTD Latihan Kerja Prov. NTT | {{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex justify-content-between">

        <div class="logo">
          <h1 class="fs-3 mt-3"><a href="/"><span>UPTD</span> Latihan Kerja Prov. NTT</a></h1>
        </div>

        @include('components.public-navbar')

      </div>
    </header><!-- End Header -->

    <!-- ======= hero Section ======= -->
    <section id="hero">
      <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

          <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

          <div class="carousel-inner" role="listbox">

            <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jpg)">
              <div class="carousel-container">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">The Best Business Information </h2>
                  <p class="animate__animated animate__fadeInUp">We're In The Business Of Helping You Start Your Business</p>
                  <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                </div>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)">
              <div class="carousel-container">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">At vero eos et accusamus</h2>
                  <p class="animate__animated animate__fadeInUp">Helping Business Security & Peace of Mind for Your Family</p>
                  <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                </div>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/3.jpg)">
              <div class="carousel-container">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">Temporibus autem quibusdam</h2>
                  <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem</p>
                  <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                </div>
              </div>
            </div>

          </div>

          <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>

          <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>

        </div>
      </div>
    </section><!-- End Hero Section -->

    <main id="main">

      {{-- @include('components.public-main') --}}
      @yield('container')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('components.public-footer')  
    <!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
