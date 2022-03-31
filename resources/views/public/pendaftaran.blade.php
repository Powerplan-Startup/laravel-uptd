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
                        <h2>Alumni UPTD Latihan Kerja Prov. NTT</h2>
                            <div class="entry-meta">
                                <span class="author-meta"><i class="bi bi-person"></i> <a href="#">admin</a></span>
                                <span><i class="bi bi-clock"></i> march 28, 2016</span>
                                <span class="tag-meta">
                                    <i class="bi bi-folder"></i>
                                    <a href="#">painting</a>,
                                    <a href="#">work</a>
                                </span>
                                <span>
                                    <i class="bi bi-tags"></i>
                                    <a href="#">tools</a>,
                                    <a href="#"> Humer</a>,
                                    <a href="#">House</a>
                                </span>
                                <span><i class="bi bi-chat"></i> <a href="#">6 comments</a></span>
                            </div>
                            <div class="entry-content">
                                <p>Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris eu dui ut lectus fermentum eleifend. Pellentesque faucibus sem ante, non malesuada odio varius nec. Suspendisse
                                potenti. Proin consectetur aliquam odio nec fringilla. Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales. Fusce ornare sit amet ligula condimentum sagittis.</p>
                                <blockquote>
                                <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum
                                tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>
                                </blockquote>
                                <p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum.
                                Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae
                                lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>
                            </div>
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