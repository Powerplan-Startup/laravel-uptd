@extends('layouts.user')
@section('content')
	<div class="d-flex align-items-center p-3 my-3 text-white bg-dark rounded shadow-sm">
		<div class="me-3">
			<div style="height: 48px; width: 48px; background-image: url('{{ Storage::url($user->foto) }}'); background-size: cover; background-position: center; border-radius: 1rem"></div>
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
				<div class="p-3">
					<h6 class="pb-2 mb-0">Informasi Akun</h6>
				</div>
				<div>
					<div class="p-3 mb-5">
						<h2>Berkas Anda</h2>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>
										KTP
									</td>
									<td>
										Foto
									</td>
									<td>
										Ijazah
									</td>
									<td>
										Kartu Vaksin
									</td>
								</tr>
								<tr>
									<td>
										<a href="{{ Storage::url($user->ktp) }}" target="_blank">
											<img src="{{ Storage::url($user->ktp) }}" alt="" class="rounded shadow-sm" style="max-width: 100%; max-height: 150px">
										</a>
									</td>
									<td>
										<a href="{{ Storage::url($user->foto) }}" target="_blank">
											<img src="{{ Storage::url($user->foto) }}" alt="" class="rounded shadow-sm" style="max-width: 100%; max-height: 150px">
										</a>
									</td>
									<td>
										<a href="{{ Storage::url($user->ijazah) }}" target="_blank">
											<img src="{{ Storage::url($user->ijazah) }}" alt="" class="rounded shadow-sm" style="max-width: 100%; max-height: 150px">
										</a>
									</td>
									<td>
										<a href="{{ Storage::url($user->kartu_vaksin) }}" target="_blank">
											<img src="{{ Storage::url($user->kartu_vaksin) }}" alt="" class="rounded shadow-sm" style="max-width: 100%; max-height: 150px">
										</a>
									</td>
								</tr>
								<tr>
									@if($user->status_berkas == 'sudah')
										<td colspan="4">
											<div class="alert mb-0 alert-success">
												Berkas sudah diverifikasi, data Anda dianggap benar. Anda tidak dapat mengubah berkas jika sudah diverifikasi.
											</div>
										</td>
									@else
										<td colspan="4">
											<div class="alert mb-0 alert-warning">
												Berkas Anda belum diverifikasi, pastikan berkas yang diunggah sudah benar. Anda dapat mengubah berkas pada form dibawah ini.
											</div>
										</td>
									@endif
								</tr>
							</tbody>
						</table>
					</div>
					<div>
						@if($errors->any())
							<div class="alert alert-danger">
								{!! implode('', $errors->all('<div>:message</div>')) !!}
							</div>
						@endif
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="entry-content">
								<form action="{{ route('user.berkas.update') }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<table class="table table-borderless">
										<tbody>
											<tr>
												<td colspan="3">
													<div class="alert alert-info">
														Pilih berkas yang akan diubah, abaikan jika tidak ingin mengubah kolom berkas.
													</div>
												</td>
											</tr>
											<tr>
												<td scope="row">KTP</td>
												<td>:</td>
												<td><input
														class="form-control @error('ktp') is-invalid @enderror"
														type="file" id="ktp" name="ktp"></td>
											</tr>
											<tr>
												<td scope="row">Foto</td>
												<td>:</td>
												<td><input
														class="form-control @error('foto') is-invalid @enderror"
														type="file" id="foto" name="foto"></td>
											</tr>
											<tr>
												<td scope="row">Ijazah</td>
												<td>:</td>
												<td><input
														class="form-control @error('ijazah') is-invalid @enderror"
														type="file" id="ijazah" name="ijazah"></td>
											</tr>
											<tr>
												<td scope="row">Kartu Vaksin</td>
												<td>:</td>
												<td><input
														class="form-control @error('kartu_vaksin') is-invalid @enderror"
														type="file" id="kartu_vaksin" name="kartu_vaksin"></td>
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
		</div>
	</div>

@endsection
