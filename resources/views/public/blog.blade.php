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
                <div class="single-blog">
                    @foreach ($posts as $post)
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
                            <a href="/posts/{{ $post["slug"] }}">{{ $post["title"] }}</a>
                        </h4>
                        <p>
                            {{ $post["body"] }}
                        </p>
                    </div>
                    <span>
                        <a href="/posts/{{ $post["slug"] }}" class="ready-btn mb-3">Read more</a>
                    </span>
                    @endforeach
                </div>
            </div>
            <!-- End single blog -->
            <div class="blog-pagination">
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link">&lt;</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">&gt;</a></li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    </div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection