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
                {{-- <div class="single-blog">
                    <div class="single-blog-img">
                    <a href="blog-details.html">
                        <img src="assets/img/blog/1.jpg" alt="">
                    </a>
                    </div>
                    <div class="blog-meta">
                    <span class="comments-type">
                        <i class="bi bi-chat"></i>
                        <a href="#">11 comments</a>
                    </span>
                    <span class="date-type">
                        <i class="bi bi-calendar"></i>2016-03-05 / 09:10:16
                    </span>
                    </div>
                    <div class="blog-text">
                    <h4>
                        <a href="#">Post my imagine Items</a>
                    </h4>
                    <p>
                        Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit.
                    </p>
                    </div>
                    <span>
                    <a href="blog-details.html" class="ready-btn">Read more</a>
                    </span>
                </div> --}}
                <div class="row">
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
            <!-- End single blog -->
        </div>
    </div>
</div>
</div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection