@extends('public.main')

@section('container')
<main id="main">
{{-- 
<!-- ======= Blog Header ======= -->
<div class="header-bg page-area">
    <div class="container position-relative">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="slider-content text-center">
            <div class="header-bottom">
            <div class="layer2">
                <h1 class="title2">Blog Details </h1>
            </div>
            <div class="layer3">
                <h2 class="title3">profesional Blog Page</h2>
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
                    <!-- single-blog start -->
                    <article class="blog-post-wrapper">
                        <div class="post-thumbnail">
                        <img src="assets/img/blog/6.jpg" alt="" />
                        </div>
                        <div class="post-information">
                        <h2>Daftar Calon Peserta Pelatihan</h2>
   
                        </div>
                    </article>
                    <div class="clear"></div>
                    <!-- single-blog end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection