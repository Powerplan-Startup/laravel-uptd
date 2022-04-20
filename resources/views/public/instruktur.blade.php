@extends('public.main')

@section('container')
    <main id="main">
        <div class="blog-page area-padding">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="section-headline services-head text-center">
                                    <h2>Instruktur</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="container">
                                <div class="row py-5">
                                    <div class="col-lg-6 mx-auto">
                                        <div class="articles card border-0 shadow-lg rounded-md">
                                            <div class="card-body no-padding">
                                                @foreach ($instruktur as $inst)
                                                    <div class="item d-flex align-items-center">
                                                        <div class="image">
                                                            <div class="rounded-circle bg-light img-fluid d-flex justify-content-center align-items-center"
                                                                style="height: 3rem; width: 3rem">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-person"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="text text-start">
                                                            <h3 class="h5">{{ $inst->nama }}</h3>
                                                            <div>
                                                                <small>
                                                                    NIP.{{ $inst->nip }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div><!-- End Blog Page -->

    </main><!-- End #main -->
@endsection

@push('head')
    <style>
        body {
            background: #eee;
        }

        .articles a {
            text-decoration: none !important;
            display: block;
            margin-bottom: 0;
            color: #555
        }

        .articles .badge {
            font-size: 0.7em;
            padding: 5px 10px;
            line-height: 1;
            margin-left: 10px
        }

        .articles .item {
            padding: 20px
        }

        .articles .item:nth-of-type(even) {
            background: #fafafa
        }

        .articles .item .image {
            min-width: 50px;
            max-width: 50px;
            height: 50px;
            margin-right: 15px
        }

        .articles .item img {
            padding: 3px;
            border: 1px solid #28a745
        }

        .articles .item h3 {
            color: #555;
            font-weight: 400;
            margin-bottom: 0
        }

        .articles .item small {
            color: #aaa;
            font-size: 0.75em
        }

        .card-close {
            position: absolute;
            top: 15px;
            right: 15px
        }

        .card-close .dropdown-toggle {
            color: #999;
            background: none;
            border: none
        }

        .card-close .dropdown-toggle:after {
            display: none
        }

        .card-close .dropdown-menu {
            border: none;
            min-width: auto;
            font-size: 0.9em;
            border-radius: 0;
            -webkit-box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.1), -2px -2px 3px rgba(0, 0, 0, 0.1);
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.1), -2px -2px 3px rgba(0, 0, 0, 0.1)
        }

        .card-close .dropdown-menu a {
            color: #999 !important
        }

        .card-close .dropdown-menu a:hover {
            background: #796AEE;
            color: #fff !important
        }

        .card-close .dropdown-menu a i {
            margin-right: 10px;
            -webkit-transition: none;
            transition: none
        }

    </style>
@endpush
