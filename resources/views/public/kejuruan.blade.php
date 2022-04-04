@extends('public.main')

@section('container')
<main id="main">

{{-- <!-- ======= Blog Header ======= -->
<div class="header-bg page-area">
    <div class="container position-relative">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="slider-content text-center">
            <div class="header-bottom">
            <div class="layer2">
                <h1 class="title2">My Blog</h1>
            </div>
            <div class="layer3">
                <h2 class="title3">Profesional Blog Page</h2>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div><!-- End Blog Header --> --}}

<!-- ======= Blog Page ======= -->
<div class="blog-page area-padding">
    <div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <x-public-left-sidebar></x-public-left-sidebar>
        </div>
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- ======= Services Section ======= -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline services-head text-center">
                            <h2>Kejuruan</h2>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    @foreach ($kejuruan as $kej )
                    <!-- Start Left services -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                            <a class="services-icon" href="#">
                                <i class="bi bi-slack"></i>
                            </a>
                            <h4>{{ $kej->nama_kejuruan }}</h4>
                            <p>
                                will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                            </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                        </div>
                    </div>
                    @endforeach
                </div><!-- End Services Section -->
            </div>
            <!-- End single blog -->
        </div>
    </div>
</div>
</div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection