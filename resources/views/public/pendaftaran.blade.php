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
                            <h2>Form Pendaftaran Calon Peserta Pelatihan</h2>
                            <div class="entry-meta">
                            </div>
                            <div class="entry-content">
                                <form action="public/pendaftaran" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td scope="row">Nomor Peserta</td>
                                                <td >:</td>
                                                <td ><input class="form-control" type="text" id="no_peserta" disabled></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Nama Peserta</td>
                                                <td >:</td>
                                                <td ><input class="form-control @error('nama')is-invalid @enderror" type="text" id="nama" name="nama" required autofocus value="{{ old('nama') }}"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Jenis Kelamin</td>
                                                <td >:</td>
                                                <td ><select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                                    <option selected>Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">NIK</td>
                                                <td >:</td>
                                                <td ><input class="form-control @error('nik')is-invalid @enderror" type="number" id="nik" name="nik" value="{{ old('nik') }}" required></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Tempat Lahir</td>
                                                <td >:</td>
                                                <td ><input class="form-control @error('tempat_lahir')is-invalid @enderror" type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Tanggal Lahir</td>
                                                <td >:</td>
                                                <td ><input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Umur</td>
                                                <td >:</td>
                                                <td ><input class="form-control @error('umur')is-invalid @enderror" type="number" id="umur" name="umur" value="{{ old('umur') }}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Alamat</td>
                                                <td >:</td>
                                                <td ><textarea class="form-control @error('alamat')is-invalid @enderror" type="text" id="alamat" name="alamat"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Email</td>
                                                <td >:</td>
                                                <td ><input class="form-control @error('email')is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email') }}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">No. Handphone</td>
                                                <td >:</td>
                                                <td ><input class="form-control @error('no_hp')is-invalid @enderror" type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Pendidikan Terakhir</td>
                                                <td >:</td>
                                                <td ><select class="form-select" name="pendidikan_terakhir" aria-label="Default select example">
                                                    <option selected>Pilih Pendidikan Terakhir</option>
                                                    <option value="1">SD</option>
                                                    <option value="2">SMP</option>
                                                    <option value="3">SMA-SMK</option>
                                                    <option value="4">D1</option>
                                                    <option value="5">D2</option>
                                                    <option value="6">D3</option>
                                                    <option value="7">D4-S1</option>
                                                    <option value="8">S2</option>
                                                    <option value="9">S3</option>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Nama Kejuruan</td>
                                                <td >:</td>
                                                <td ><select class="form-select" name="nama_kejuruan" aria-label="Default select example">
                                                    <option selected>Pilih Nama Kejuruan</option>
                                                    <option value="1">TIK</option>
                                                    <option value="2">Otomotif</option>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Agama</td>
                                                <td >:</td>
                                                <td ><select class="form-select" name="agama" aria-label="Default select example">
                                                    <option selected>Pilih Agama</option>
                                                    <option value="1">Islam</option>
                                                    <option value="2">Kristen</option>
                                                    <option value="3">Katolik</option>
                                                    <option value="4">Hindu</option>
                                                    <option value="5">Budha</option>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Status</td>
                                                <td >:</td>
                                                <td ><input class="form-control @error('status')is-invalid @enderror" type="text" id="status" name="status" value="{{ old('status') }}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Tanggal Daftar</td>
                                                <td >:</td>
                                                <td ><input class="form-control" type="date" id="tanggal_daftar" name="tanggal_daftar">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">NIP</td>
                                                <td >:</td>
                                                <td ><input class="form-control" type="text" id="nip" name="nip" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Angkatan</td>
                                                <td >:</td>
                                                <td ><input class="form-control" type="text" id="angkatan" name="angkatan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Pekerjaan</td>
                                                <td >:</td>
                                                <td ><input class="form-control" type="text" id="pekerjaan" name="pekerjaan" disabled>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </form>
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