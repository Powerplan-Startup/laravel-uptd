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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>Instruktur</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                @foreach ($instruktur as $inst)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-team-member">
                        <div class="team-img">
                            <a href="#">
                                <img src="assets/img/team/1.jpg" alt="">
                            </a>
                            <div class="team-social-icon text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>{{ $inst->nama }}</h4>
                            <p>NIP. {{ $inst->nip }}</p>
                            <p>{{ $inst->materi }}</p>
                        </div>
                    </div>
                </div>
                <!-- End column -->
                @endforeach
            </div>
        </div>
    </div>
</div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection