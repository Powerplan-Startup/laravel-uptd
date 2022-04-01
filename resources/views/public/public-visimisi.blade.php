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
                        <div class="post-information">
                        <h2>Visi Misi UPTD Latihan Kerja Prov. Nusa Tenggara Timur</h2>
                            <div class="entry-meta">
                            </div>
                            <div class="entry-content">
                                <blockquote>
                                <p><h3>Visi</h3></p>
                                <p>Nusa Tenggara Timur bangkit menuju masyarakat sejahtera dalam bingkai Negara Kesatuan Republik Indonesia</p>
                                </blockquote>
                                <blockquote>
                                <p><h3>Misi</h3></p>
                                <p>1. Mewujudkan masyarakat Sejahtera, Mandiri, dan Adil</p>
                                <p>2. Membangun Nusa Tenggara Timur sebagai salah satu gerbang</p>
                                <p>3. Pusat pengembangan pariwisata Nasional</p>
                                <p>4. Meningkatkan Ketersediaan dan Kualitas Infrastruktur untuk mempercepat pembangunan</p>
                                <p>5. Meningkatkan sumber daya manusia</p>
                                <p>6. Mewujudkan informasi Birokrasi Pemerintah untuk meningkatkan kualitas pelayanan publik</p>
                                </blockquote>

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