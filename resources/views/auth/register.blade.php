@extends('public.main')

@push('head')
    <style>
        .table td, .table th{
            border-top: unset!important;
        }
    </style>
@endpush
@section('container')
    <main id="main" class="bg-dark">
        <!-- ======= Blog Page ======= -->
        <div class="blog-page area-padding" style="padding: 2rem 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- single-blog start -->
                                <article class="blog-post-wrapper">
                                    <div class="post-information">
                                        <h2 style="margin-bottom: 2rem">
                                            Form Pendaftaran <br>
                                            Calon Peserta Pelatihan
                                        </h2>
                                        @if($kejuruan->count() > 0)
                                            <div>
                                                @if($errors->any())
                                                    <div class="alert alert-danger">
                                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                                    </div>
                                                @endif
                                            </div>
                                            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-10 col-sm-12">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                {{-- <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Nomor Peserta</td>
                                                                    <td><input class="form-control" type="text" id="no_peserta"
                                                                            disabled></td>
                                                                </tr> --}}
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Nama Peserta</td>
                                                                    <td><input
                                                                            class="form-control @error('nama') is-invalid @enderror"
                                                                            type="text" id="nama" name="nama" required
                                                                            value="{{ old('nama') }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Jenis Kelamin</td>
                                                                    <td><select class="form-select form-control" name="jenis_kelamin"
                                                                            aria-label="Default select example">
                                                                            <option selected>Pilih Jenis Kelamin</option>
                                                                            <option value="l" {{ old('jenis_kelamin') == 'l' ? 'selected' : null }}>Laki - Laki</option>
                                                                            <option value="p" {{ old('jenis_kelamin') == 'p' ? 'selected' : null }}>Perempuan</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">NIK</td>
                                                                    <td><input
                                                                            class="form-control @error('nik') is-invalid @enderror"
                                                                            type="text" id="nik" name="nik" maxlength="16" pattern="\d*"
                                                                            value="{{ old('nik') }}" required></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Tempat Lahir</td>
                                                                    <td><input
                                                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                                            type="text" id="tempat_lahir" name="tempat_lahir"
                                                                            value="{{ old('tempat_lahir') }}" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Tanggal Lahir</td>
                                                                    <td><input class="form-control" type="date" id="tanggal_lahir"
                                                                            name="tanggal_lahir" onchange="getAge();" value="{{ old('tanggal_lahir') }}"  required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Umur</td>
                                                                    <td><input
                                                                            class="form-control @error('umur') is-invalid @enderror"
                                                                            type="number" id="umur" name="umur"
                                                                            value="{{ old('umur') }}" required readonly>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-4 col-md-10 col-sm-12">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Alamat</td>
                                                                    <td>
                                                                        <textarea class="form-control @error('alamat') is-invalid @enderror" type="text" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">No. Handphone</td>
                                                                    <td><input
                                                                            class="form-control @error('no_hp') is-invalid @enderror"
                                                                            type="text" id="no_hp" name="no_hp" maxlength="12" pattern="\d*"
                                                                            value="{{ old('no_hp') }}" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Pendidikan Terakhir</td>
                                                                    <td><select class="form-select form-control" name="pendidikan_terakhir"
                                                                            aria-label="Default select example">
                                                                            <option selected>Pilih Pendidikan Terakhir</option>
                                                                            <option value="1" {{ old('pendidikan_terakhir') == '1' ? 'selected' : null }}>SD</option>
                                                                            <option value="2" {{ old('pendidikan_terakhir') == '2' ? 'selected' : null }}>SMP</option>
                                                                            <option value="3" {{ old('pendidikan_terakhir') == '3' ? 'selected' : null }}>SMA-SMK</option>
                                                                            <option value="4" {{ old('pendidikan_terakhir') == '4' ? 'selected' : null }}>D1</option>
                                                                            <option value="5" {{ old('pendidikan_terakhir') == '5' ? 'selected' : null }}>D2</option>
                                                                            <option value="6" {{ old('pendidikan_terakhir') == '6' ? 'selected' : null }}>D3</option>
                                                                            <option value="7" {{ old('pendidikan_terakhir') == '7' ? 'selected' : null }}>D4-S1</option>
                                                                            <option value="8" {{ old('pendidikan_terakhir') == '8' ? 'selected' : null }}>S2</option>
                                                                            <option value="9" {{ old('pendidikan_terakhir') == '9' ? 'selected' : null }}>S3</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Kejuruan</td>
                                                                    <td>
                                                                        <select class="form-select form-control" name="id_kejuruan"
                                                                            aria-label="Default select example">
                                                                            <option selected>Pilih Nama Kejuruan</option>
                                                                            @foreach ($kejuruan as $item)
                                                                                <option value="{{ $item->id_kejuruan }}" {{ old('id_kejuruan') == $item->id_kejuruan ? 'selected' : null }}>{{ $item->nama_kejuruan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Agama</td>
                                                                    <td><select class="form-select form-control" name="agama"
                                                                            aria-label="Default select example">
                                                                            <option selected>Pilih Agama</option>
                                                                            <option value="islam" {{ old('agama') == 'islam' ? 'selected' : null }}>Islam</option>
                                                                            <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : null }}>Kristen</option>
                                                                            <option value="katolik" {{ old('agama') == 'katolik' ? 'selected' : null }}>Katolik</option>
                                                                            <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : null }}>Hindu</option>
                                                                            <option value="budha" {{ old('agama') == 'budha' ? 'selected' : null }}>Budha</option>
                                                                            <option value="konghucu" {{ old('agama') == 'konghucu' ? 'selected' : null }}>Konghucu</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Status</td>
                                                                    <td><select class="form-select form-control" name="status"
                                                                            aria-label="Default select example">
                                                                            <option selected>Pilih Status</option>
                                                                            <option value="lajang" {{ old('status') == 'lajang' ? 'selected' : null }}>Lajang</option>
                                                                            <option value="menikah" {{ old('status') == 'menikah' ? 'selected' : null }}>Menikah</option>
                                                                            <option value="dua" {{ old('status') == 'dua' ? 'selected' : null }}>Duda</option>
                                                                            <option value="janda" {{ old('status') == 'janda' ? 'selected' : null }}>Janda</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <!-- <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Pekerjaan</td>
                                                                    <td><input
                                                                            class="form-control @error('pekerjaan') is-invalid @enderror"
                                                                            type="text" id="pekerjaan" name="pekerjaan"
                                                                            value="{{ old('pekerjaan') }}" required>
                                                                    </td>
                                                                </tr> -->
                                                                {{-- <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Tanggal Daftar</td>
                                                                    <td><input class="form-control" type="date"
                                                                            id="tanggal_daftar" name="tanggal_daftar">
                                                                    </td>
                                                                </tr> --}}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-4 col-md-10 col-sm-12">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px" colspan="3">
                                                                        <div class="small text-muted">
                                                                            Informasi Akun
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Email</td>
                                                                    <td><input
                                                                            class="form-control @error('email') is-invalid @enderror"
                                                                            type="text" id="email" name="email"
                                                                            value="{{ old('email') }}" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Password</td>
                                                                    <td><input class="form-control" type="password" id="password"
                                                                            name="password">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Ulangi Password</td>
                                                                    <td><input class="form-control" type="password" id="password_confirmation"
                                                                            name="password_confirmation">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px" colspan="3">
                                                                        <div class="small text-muted">
                                                                            Berkas Persyaratan
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">KTP</td>
                                                                    <td><input
                                                                            class="form-control @error('ktp') is-invalid @enderror"
                                                                            type="file" id="ktp" name="ktp"
                                                                            value="{{ old('ktp') }}" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Ijazah</td>
                                                                    <td><input
                                                                            class="form-control @error('ijazah') is-invalid @enderror"
                                                                            type="file" id="ijazah" name="ijazah"
                                                                            value="{{ old('ijazah') }}" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Foto</td>
                                                                    <td><input
                                                                            class="form-control @error('foto') is-invalid @enderror"
                                                                            type="file" id="foto" name="foto"
                                                                            value="{{ old('foto') }}" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" class="small text-muted" style="max-width: 100px">Sertifikat/Kartu Vaksi</td>
                                                                    <td><input
                                                                            class="form-control @error('kartu_vaksin') is-invalid @enderror"
                                                                            type="file" id="kartu_vaksin" name="kartu_vaksin"
                                                                            value="{{ old('ijazah') }}" required>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div style="padding: 2rem">
                                                    <div class="py-5 d-flex px-2" style="display: flex">
                                                        <button type="submit" class="btn btn-primary px-5 py-3 ms-auto rounded-3" style="padding: .5rem 3.5rem; margin: 0 auto">Daftar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Maaf</h4>
                                                <p>
                                                    belum ada pendaftaran untuk saat ini. silahkan kunjungi laman <a href="{{ route('blog') }}" class="alert-link">berita</a> untuk informasi lebih lanjut.
                                                </p>
                                                <hr>
                                                <p class="mb-0">
                                                    Atau silahkan kunjungi <a href="{{ route('login') }}" class="alert-link">halaman login</a>
                                                </p>
                                            </div>
                                        @endif
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
        <script>
            function getAge() {
                var date = document.getElementById('tanggal_lahir').value;

                if (date === "") {
                    alert("Please complete the required field!");
                } else {
                    var today = new Date();
                    var umur = new Date(date);
                    var year = 0;
                    if (today.getMonth() < umur.getMonth()) {
                        year = 1;
                    } else if ((today.getMonth() == umur.getMonth()) && today.getDate() < umur.getDate()) {
                        year = 1;
                    }
                    var umur = today.getFullYear() - umur.getFullYear() - year;

                    if (umur < 0) {
                        umur = 0;
                    }
                    document.getElementById('umur').value = umur;
                    console.log(umur);
                }
            }
        </script>
    </main><!-- End #main -->
@endsection
