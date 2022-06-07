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
        <div class="row" style="justify-content: center">
        <!-- End left sidebar -->
        <!-- Start single blog -->
            <div class="col-xs-12" style="padding: 1rem;">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- single-blog start -->
                        <article class="blog-post-wrapper">
                            <div class="post-information" style="margin-bottom: 1rem">
                                <h3>Daftar Alumni</h3>
                            </div>
                            <div class="width: 100%">
                                <table class="table table-bordered" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>TTL</th>
                                            <th>Umur</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Agama</th>
                                            <th>Status</th>
                                            <th>Kejuruan</th>
                                            <th>Angkatan</th>
                                        </tr>
                                        @foreach ($peserta as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->nama }}
                                                </td>
                                                <td>
                                                    {{ $item->jenis_kelamin == "l" ? "Laki-Laki" : "Perempuan" }}
                                                </td>
                                                <td>
                                                    {{ $item->tempat_lahir }},
                                                    {{ $item->tanggal_lahir }}
                                                </td>
                                                <td>
                                                    {{ $item->umur }} tahun
                                                </td>
                                                <td>
                                                    {{ $item->email }}
                                                </td>
                                                <td>
                                                    {{ $item->no_hp }}
                                                </td>
                                                <td>
                                                    {{ $item->agama }}
                                                </td>
                                                <td>
                                                    {{ $item->status }}
                                                </td>
                                                <td>
                                                    {{ optional($item->kejuruan)->nama_kejuruan }}
                                                </td>
                                                <td>
                                                    {{ $item->angkatan }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {{ $peserta->links() }}
                                </div>
                            </div>
                        </article>
                    <!-- single-blog end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection