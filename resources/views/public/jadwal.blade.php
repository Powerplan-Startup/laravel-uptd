@extends('public.main')

@section('container')
<main id="main">

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
                        <h2>Jadwal Pelatihan</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                @foreach ($jadwalpelatihan as $jadwal)
                <ul class="list-group">
                    <li class="list-group-item">{{ $jadwal->hari }}, {{ $jadwal->tanggal }}</li>
                  </ul>
                {{-- <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header fw-bold">{{ $jadwal->hari }}, {{ $jadwal->tanggal }}</div>
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">{{ $jadwal->kejuruan->nama_kejuruan }}</h5>
                        <p class="card-text"><i class="bi bi-check"></i> {{ $jadwal->instruktur->nama }}</p>
                        <p class="card-text"><i class="bi bi-check"></i> {{ $jadwal->waktu }}</p>
                        <p class="card-text"><i class="bi bi-check"></i> {{ $jadwal->materi }}</p>
                    </div>
                </div> --}}
                @endforeach
            </div>
        </div>
    </div>
</div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection