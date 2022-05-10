@extends('public.main')

@section('container')
<main id="main">

<div class="blog-page area-padding">
    <div class="container">
    <div class="row">
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog">
                    <div class="single-blog-img">
                        <a href="blog-details.html">
                            <img src="{{ asset('assets/img/uptd/kepala-uptd.jpg') }}" alt="">
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
                            <a href="/posts/">Lorem, ipsum dolor.</a>
                        </h4>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae ipsam iusto sed. Quia quaerat accusamus amet officiis, aperiam sit obcaecati asperiores vitae, voluptates doloremque soluta quisquam et harum quo quam.
                        </p>
                    </div>
                    <span>
                        <a href="/posts/" class="ready-btn mb-3">Read more</a>
                    </span>
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