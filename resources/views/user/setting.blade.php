@extends('layouts.user')
@section('content')
	<div class="d-flex align-items-center p-3 my-3 text-white bg-dark rounded shadow-sm">
		<div class="me-3">
			<svg xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
			<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
			<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
			</svg>
		</div>
		<div class="lh-1">
			<h1 class="h6 mb-0 text-white lh-1">
				{{ $user->nama }}
			</h1>
			<small>
				{{ $user->email }}
			</small>
		</div>
	</div>
	
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<a href="{{ route('user.index') }}" class="my-3 p-3 rounded shadow-sm bg-dark d-flex justify-content-between w-100 text-decoration-none text-light">
				<div class="pe-3">
					Kembali ke halaman <i>Dashboard</i>
				</div>
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
					</svg>
				</div>
			</a>
			<div class="my-3 p-3 bg-body rounded shadow-sm">
				<h6 class="pb-2 mb-0">Informasi Akun</h6>
				<div>
					<h2>Form Data Peserta</h2>
					<div>
						@if($errors->any())
							<div class="alert alert-danger">
								{!! implode('', $errors->all('<div>:message</div>')) !!}
							</div>
						@endif
					</div>
					<div class="entry-content">
						<form action="{{ route('user.setting.update') }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
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
												value="{{ $user->nama }}"></td>
									</tr>
									<tr>
										<td scope="row">Jenis Kelamin</td>
										<td>:</td>
										<td><select class="form-select" name="jenis_kelamin"
												aria-label="Default select example">
												<option selected>Pilih Jenis Kelamin</option>
												<option value="l" {{ $user->jenis_kelamin == 'l' ? 'selected' : null }}>Laki - Laki</option>
												<option value="p" {{ $user->jenis_kelamin == 'p' ? 'selected' : null }}>Perempuan</option>
											</select>
										</td>
									</tr>
									<tr>
										<td scope="row">NIK</td>
										<td>:</td>
										<td><input
												class="form-control @error('nik') is-invalid @enderror"
												type="number" id="nik" name="nik"
												value="{{ $user->nik }}" required></td>
									</tr>
									<tr>
										<td scope="row">Tempat Lahir</td>
										<td>:</td>
										<td><input
												class="form-control @error('tempat_lahir') is-invalid @enderror"
												type="text" id="tempat_lahir" name="tempat_lahir"
												value="{{ $user->tempat_lahir }}" required>
										</td>
									</tr>
									<tr>
										<td scope="row">Tanggal Lahir</td>
										<td>:</td>
										<td><input class="form-control" type="date" id="tanggal_lahir"
												name="tanggal_lahir" onchange="getAge();" required value="{{ $user->tanggal_lahir }}" >
										</td>
									</tr>
									<tr>
										<td scope="row">Umur</td>
										<td>:</td>
										<td><input
												class="form-control @error('umur') is-invalid @enderror"
												type="number" id="umur" name="umur"
												value="{{ $user->umur }}" required readonly>
										</td>
									</tr>
									<tr>
										<td scope="row">Alamat</td>
										<td>:</td>
										<td>
											<textarea class="form-control @error('alamat') is-invalid @enderror" type="text" id="alamat" name="alamat">{{ $user->alamat }}</textarea>
										</td>
									</tr>
									<tr>
										<td scope="row">No. Handphone</td>
										<td>:</td>
										<td><input
												class="form-control @error('no_hp') is-invalid @enderror"
												type="text" id="no_hp" name="no_hp"
												value="{{ $user->no_hp }}" required>
										</td>
									</tr>
									<tr>
										<td scope="row">Pendidikan Terakhir</td>
										<td>:</td>
										<td><select class="form-select" name="pendidikan_terakhir"
												aria-label="Default select example">
												<option selected>Pilih Pendidikan Terakhir</option>
												<option value="1" {{ $user->pendidikan_terakhir == '1' ? 'selected' : null }}>SD</option>
												<option value="2" {{ $user->pendidikan_terakhir == '2' ? 'selected' : null }}>SMP</option>
												<option value="3" {{ $user->pendidikan_terakhir == '3' ? 'selected' : null }}>SMA-SMK</option>
												<option value="4" {{ $user->pendidikan_terakhir == '4' ? 'selected' : null }}>D1</option>
												<option value="5" {{ $user->pendidikan_terakhir == '5' ? 'selected' : null }}>D2</option>
												<option value="6" {{ $user->pendidikan_terakhir == '6' ? 'selected' : null }}>D3</option>
												<option value="7" {{ $user->pendidikan_terakhir == '7' ? 'selected' : null }}>D4-S1</option>
												<option value="8" {{ $user->pendidikan_terakhir == '8' ? 'selected' : null }}>S2</option>
												<option value="9" {{ $user->pendidikan_terakhir == '9' ? 'selected' : null }}>S3</option>
											</select>
										</td>
									</tr>
									<tr>
										<td scope="row">Kejuruan</td>
										<td>:</td>
										<td>
											<select class="form-select" name="id_kejuruan"
												aria-label="Default select example" disabled>
												<option selected>Pilih Nama Kejuruan</option>
												@foreach ($kejuruan as $item)
													<option value="{{ $item->id_kejuruan }}"  {{ $user->id_kejuruan == $item->id_kejuruan ? 'selected' : null }}>{{ $item->nama_kejuruan }}</option>
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
												<option value="islam" {{ $user->agama == 'islam' ? 'selected' : null }}>Islam</option>
												<option value="kristen" {{ $user->agama == 'kristen' ? 'selected' : null }}>Kristen</option>
												<option value="katolik" {{ $user->agama == 'katolik' ? 'selected' : null }}>Katolik</option>
												<option value="hindu" {{ $user->agama == 'hindu' ? 'selected' : null }}>Hindu</option>
												<option value="budha" {{ $user->agama == 'budha' ? 'selected' : null }}>Budha</option>
												<option value="konghucu" {{ $user->agama == 'konghucu' ? 'selected' : null }}>Konghucu</option>
											</select>
										</td>
									</tr>
									<tr>
										<td scope="row">Status</td>
										<td>:</td>
										<td><select class="form-select" name="status"
												aria-label="Default select example">
												<option selected>Pilih Status</option>
												<option value="lajang" {{ $user->status == 'lajang' ? 'selected' : null }}>Lajang</option>
												<option value="menikah" {{ $user->status == 'menikah' ? 'selected' : null }}>Menikah</option>
												<option value="dua" {{ $user->status == 'dua' ? 'selected' : null }}>Duda</option>
												<option value="janda" {{ $user->status == 'janda' ? 'selected' : null }}>Janda</option>
											</select>
										</td>
									</tr>
									<tr>
										<td scope="row">Pekerjaan</td>
										<td>:</td>
										<td><input
												class="form-control @error('pekerjaan') is-invalid @enderror"
												type="text" id="pekerjaan" name="pekerjaan"
												value="{{ $user->pekerjaan }}" required>
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
												value="{{ $user->email }}" required>
										</td>
									</tr>
									{{-- <tr>
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
									</tr> --}}
								</tbody>
							</table>
							<div class="py-5 d-flex px-2">
								<button type="submit" class="btn btn-primary px-5 py-3 btn-sm ms-auto rounded-3 w-100">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
