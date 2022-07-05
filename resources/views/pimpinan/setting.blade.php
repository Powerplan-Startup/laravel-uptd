@extends('layouts.pimpinan')
@section('content')
	<div class="d-flex align-items-center p-3 my-3 text-white bg-dark rounded shadow-sm">
		<div class="me-3">
			<div style="height: 48px; width: 48px; background-size: cover; background-position: center; border-radius: 1rem"></div>
		</div>
		<div class="lh-1">
			<h1 class="h6 mb-0 text-white lh-1">
				{{ $user->nama }}
			</h1>
			<small>
				{{ "@".$user->username }}
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
					<div>
						@if($errors->any())
							<div class="alert alert-danger">
								{!! implode('', $errors->all('<div>:message</div>')) !!}
							</div>
						@endif
					</div>
					<div class="entry-content">
						<form action="{{ route('pimpinan.setting.update') }}" method="POST" enctype="multipart/form-data">
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
										<td scope="row">Nama Pimpinan</td>
										<td>:</td>
										<td><input
												class="form-control @error('nama') is-invalid @enderror"
												type="text" id="nama" name="nama" required
												value="{{ $user->nama }}"></td>
									</tr>
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
												type="email" id="email" name="email"
												value="{{ $user->email }}">
										</td>
									<tr>
										<td scope="row">Username</td>
										<td>:</td>
										<td><input
												class="form-control @error('username') is-invalid @enderror"
												type="text" id="username" name="username"
												value="{{ $user->username }}" required>
										</td>
									</tr>
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
