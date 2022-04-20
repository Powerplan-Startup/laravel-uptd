@extends('public.main')

@section('container')
<main id="main">

<!-- ======= Blog Page ======= -->
<div class="blog-page area-padding">
    <div class="container">
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline services-head text-center">
                    <h2>Jadwal Pelatihan</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="container">
                <div class="timeline">
                    @foreach ($jadwalpelatihan as $indeks => $jadwal)
                        @if($indeks % 2 == 0)
                            <div class="timeline-row">
                                <div class="timeline-time">
                                    {{ $jadwal->waktu }}<small>{{ $jadwal->tanggal->translatedFormat('D, d-m-Y') }}</small>
                                </div>
                                <div class="timeline-content">
                                    {{-- <i class="icon-attachment"></i> --}}
                                    <small>Kejuruan</small>
                                    <h4 class="pt-0 mt-0">{{ $jadwal->kejuruan->nama_kejuruan }}</h4>
                                    <div class="text-start w-100 mb-3">
                                        Instruktur
                                    </div>
                                    <div class="w-100 text-start">
                                        <div class="d-flex w-100">
                                            <div class="pe-4">
                                                <div class="bg-light d-flex justify-content-center align-items-center" style="height: 2.5rem; width: 2.5rem; border-radius: 50%">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="fw-bold">
                                                    {{ $jadwal->instruktur->nama }}
                                                </div>
                                                <div>
                                                    NIP.{{ $jadwal->instruktur->nip }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="timeline-row">
                                <div class="timeline-time">
                                    {{ $jadwal->waktu }}<small>{{ $jadwal->tanggal->translatedFormat('D, d-m-Y') }}</small>
                                </div>
                                <div class="timeline-content">
                                    <small>Kejuruan</small>
                                    <h4 class="pt-0 mt-0">{{ $jadwal->kejuruan->nama_kejuruan }}</h4>
                                    <div class="text-start w-100 mb-3">
                                        Instruktur
                                    </div>
                                    <div class="w-100 text-start">
                                        <div class="d-flex w-100">
                                            <div class="pe-4">
                                                <div class="bg-light d-flex justify-content-center align-items-center" style="height: 2.5rem; width: 2.5rem; border-radius: 50%">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="fw-bold">
                                                    {{ $jadwal->instruktur->nama }}
                                                </div>
                                                <div>
                                                    NIP.{{ $jadwal->instruktur->nip }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection

@push('head')
    <style>
    body{
        color: #bcd0f7;
        background: #1A233A;
    }
    .timeline {
        position: relative;
        background: #272e48;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        padding: 5rem;
        margin: 0 auto 1rem auto;
        overflow: hidden;
    }
    .timeline:after {
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        margin-left: -2px;
        border-right: 2px dashed #4b546f;
        height: 100%;
        display: block;
    }

    .timeline-row {
        padding-left: 50%;
        position: relative;
        margin-bottom: 30px;
    }
    .timeline-row .timeline-time {
        position: absolute;
        right: 50%;
        top: 15px;
        text-align: right;
        margin-right: 20px;
        color: #bcd0f7;
        font-size: 1.5rem;
    }
    .timeline-row .timeline-time small {
        display: block;
        font-size: 0.8rem;
    }
    .timeline-row .timeline-content {
        position: relative;
        padding: 20px 30px;
        background: #fff;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
    .timeline-row .timeline-content:after {
        content: "";
        position: absolute;
        top: 20px;
        height: 16px;
        width: 16px;
        background: #fff;
    }
    .timeline-row .timeline-content:before {
        content: "";
        position: absolute;
        top: 20px;
        right: -49px;
        width: 20px;
        height: 20px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
        z-index: 10;
        background: #272e48;
        border: 2px dashed #4b546f;
    }
    .timeline-row .timeline-content h4 {
        margin: 0 0 20px 0;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        line-height: 150%;
    }
    .timeline-row .timeline-content p {
        margin-bottom: 30px;
        line-height: 150%;
    }
    .timeline-row .timeline-content i {
        font-size: 1.2rem;
        line-height: 100%;
        padding: 15px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
        background: #272e48;
        margin-bottom: 10px;
        display: inline-block;
    }
    .timeline-row .timeline-content .thumbs {
        margin-bottom: 20px;
        display: flex;
    }
    .timeline-row .timeline-content .thumbs img {
        margin: 5px;
        max-width: 60px;
    }
    .timeline-row .timeline-content .badge {
        color: #ffffff;
        background: linear-gradient(120deg, #00b5fd 0%, #0047b1 100%);
    }
    .timeline-row:nth-child(even) .timeline-content {
        margin-left: 40px;
        text-align: left;
    }
    .timeline-row:nth-child(even) .timeline-content:after {
        left: -8px;
        right: initial;
        border-bottom: 0;
        border-left: 0;
        transform: rotate(-135deg);
    }
    .timeline-row:nth-child(even) .timeline-content:before {
        left: -52px;
        right: initial;
    }
    .timeline-row:nth-child(odd) {
        padding-left: 0;
        padding-right: 50%;
    }
    .timeline-row:nth-child(odd) .timeline-time {
        right: auto;
        left: 50%;
        text-align: left;
        margin-right: 0;
        margin-left: 20px;
    }
    .timeline-row:nth-child(odd) .timeline-content {
        margin-right: 40px;
    }
    .timeline-row:nth-child(odd) .timeline-content:after {
        right: -8px;
        border-left: 0;
        border-bottom: 0;
        transform: rotate(45deg);
    }

    @media (max-width: 992px) {
        .timeline {
            padding: 15px;
        }
        .timeline:after {
            border: 0;
        }
        .timeline .timeline-row:nth-child(odd) {
            padding: 0;
        }
        .timeline .timeline-row:nth-child(odd) .timeline-time {
            position: relative;
            top: 0;
            left: 0;
            margin: 0 0 10px 0;
        }
        .timeline .timeline-row:nth-child(odd) .timeline-content {
            margin: 0;
        }
        .timeline .timeline-row:nth-child(odd) .timeline-content:before {
            display: none;
        }
        .timeline .timeline-row:nth-child(odd) .timeline-content:after {
            display: none;
        }
        .timeline .timeline-row:nth-child(even) {
            padding: 0;
        }
        .timeline .timeline-row:nth-child(even) .timeline-time {
            position: relative;
            top: 0;
            left: 0;
            margin: 0 0 10px 0;
            text-align: left;
        }
        .timeline .timeline-row:nth-child(even) .timeline-content {
            margin: 0;
        }
        .timeline .timeline-row:nth-child(even) .timeline-content:before {
            display: none;
        }
        .timeline .timeline-row:nth-child(even) .timeline-content:after {
            display: none;
        }
    }
    </style>
@endpush