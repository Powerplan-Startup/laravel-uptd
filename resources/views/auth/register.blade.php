@extends('public.main')

@section('container')
    <main id="main">
        <!-- ======= Blog Page ======= -->
        <div class="blog-page area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12 mx-auto">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <!-- single-blog start -->
                                <article class="blog-post-wrapper">
                                    <div class="post-information">
                                        <h2>Form Pendaftaran Calon Peserta Pelatihan</h2>
                                        <div>
                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="entry-content">
                                            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        {{-- <tr>
                                                            <td scope="row">Nomor Peserta</td>
                                                            <td>:</td>
                                                            <td><input class="form-control" type="text" id="no_peserta"
                                                                    disabled></td>
                                                        </tr> --}}
                                                        <tr>
                                                            <td scope="row">Nama Peserta</td>
                                                            <td>:</td>
                                                            <td><input
                                                                    class="form-control @error('nama') is-invalid @enderror"
                                                                    type="text" id="nama" name="nama" required
                                                                    value="{{ old('nama') }}"></td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Jenis Kelamin</td>
                                                            <td>:</td>
                                                            <td><select class="form-select" name="jenis_kelamin"
                                                                    aria-label="Default select example">
                                                                    <option selected>Pilih Jenis Kelamin</option>
                                                                    <option value="l">Laki - Laki</option>
                                                                    <option value="p">Perempuan</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">NIK</td>
                                                            <td>:</td>
                                                            <td><input
                                                                    class="form-control @error('nik') is-invalid @enderror"
                                                                    type="number" id="nik" name="nik"
                                                                    value="{{ old('nik') }}" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Tempat Lahir</td>
                                                            <td>:</td>
                                                            <td><input
                                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                                    type="text" id="tempat_lahir" name="tempat_lahir"
                                                                    value="{{ old('tempat_lahir') }}" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Tanggal Lahir</td>
                                                            <td>:</td>
                                                            <td><input class="form-control" type="date" id="tanggal_lahir"
                                                                    name="tanggal_lahir" onchange="getAge();" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Umur</td>
                                                            <td>:</td>
                                                            <td><input
                                                                    class="form-control @error('umur') is-invalid @enderror"
                                                                    type="number" id="umur" name="umur"
                                                                    value="{{ old('umur') }}" required readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Alamat</td>
                                                            <td>:</td>
                                                            <td>
                                                                <textarea class="form-control @error('alamat') is-invalid @enderror" type="text" id="alamat" name="alamat"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">No. Handphone</td>
                                                            <td>:</td>
                                                            <td><input
                                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                                    type="text" id="no_hp" name="no_hp"
                                                                    value="{{ old('no_hp') }}" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Pendidikan Terakhir</td>
                                                            <td>:</td>
                                                            <td><select class="form-select" name="pendidikan_terakhir"
                                                                    aria-label="Default select example">
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
                                                            <td scope="row">Kejuruan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <select class="form-select" name="id_kejuruan"
                                                                    aria-label="Default select example">
                                                                    <option selected>Pilih Nama Kejuruan</option>
                                                                    @foreach ($kejuruan as $item)
                                                                        <option value="{{ $item->id_kejuruan }}">{{ $item->nama_kejuruan }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Agama</td>
                                                            <td>:</td>
                                                            <td><select class="form-select" name="agama"
                                                                    aria-label="Default select example">
                                                                    <option selected>Pilih Agama</option>
                                                                    <option value="islam">Islam</option>
                                                                    <option value="kristen">Kristen</option>
                                                                    <option value="katolik">Katolik</option>
                                                                    <option value="hindu">Hindu</option>
                                                                    <option value="budha">Budha</option>
                                                                    <option value="konghucu">Konghucu</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Status</td>
                                                            <td>:</td>
                                                            <td><select class="form-select" name="status"
                                                                    aria-label="Default select example">
                                                                    <option selected>Pilih Status</option>
                                                                    <option value="lajang">Lajang</option>
                                                                    <option value="menikah">Menikah</option>
                                                                    <option value="dua">Duda</option>
                                                                    <option value="janda">Janda</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Pekerjaan</td>
                                                            <td>:</td>
                                                            <td><input
                                                                    class="form-control @error('pekerjaan') is-invalid @enderror"
                                                                    type="text" id="pekerjaan" name="pekerjaan"
                                                                    value="{{ old('pekerjaan') }}" required>
                                                            </td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <td scope="row">Tanggal Daftar</td>
                                                            <td>:</td>
                                                            <td><input class="form-control" type="date"
                                                                    id="tanggal_daftar" name="tanggal_daftar">
                                                            </td>
                                                        </tr> --}}
                                                        <tr>
                                                            <td scope="row" colspan="3">
                                                                <div class="small text-muted">
                                                                    Informasi Akun
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Email</td>
                                                            <td>:</td>
                                                            <td><input
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    type="text" id="email" name="email"
                                                                    value="{{ old('email') }}" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Password</td>
                                                            <td>:</td>
                                                            <td><input class="form-control" type="password" id="password"
                                                                    name="password">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Ulangi Password</td>
                                                            <td>:</td>
                                                            <td><input class="form-control" type="password" id="password_confirmation"
                                                                    name="password_confirmation">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="py-5 d-flex px-2">
                                                    <div></div>
                                                    <button type="submit" class="btn btn-primary px-5 py-3 btn-sm ms-auto rounded-3">Daftar</button>
                                                </div>
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
