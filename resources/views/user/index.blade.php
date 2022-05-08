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
	
	<div class="row">
		<div class="col-lg-6">
			<x-user.user-info :user="$user"></x-user.user-info>
		</div>
		<div class="col-lg-6">
			<a href="#" class="my-3 p-3 bg-body rounded shadow-sm bg-primary d-flex justify-content-between w-100">
				<div class="pe-3">
					Lihat berita dan pengumuman
				</div>
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
					</svg>
				</div>
			</a>
			<div class="my-3 p-3 bg-body rounded shadow-sm">
				<h6 class="border-bottom pb-2 mb-0">Informasi Akun</h6>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff"
							dy=".3em">32x32</text>
					</svg>
		
					<p class="pb-3 mb-0 small lh-sm border-bottom w-100">
						<strong class="d-block text-gray-dark">Nama</strong>
						{{ $user->nama }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#e83e8c" /><text x="50%" y="50%" fill="#e83e8c"
							dy=".3em">32x32</text>
					</svg>
		
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">Email</strong>
						{{ $user->email }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
		
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">Jenis Kelamin</strong>
						{{ $user->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
		
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">NIK</strong>
						{{ $user->nik }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">TTL</strong>
						{{ $user->tempat_lahir }}, 
						{{ $user->tanggal_lahir }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">Alamat</strong>
						{{ $user->alamat }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">No H.P.</strong>
						{{ $user->no_hp }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">Penidikan Terakhir</strong>
						{{ $user->pendidikan_terahir }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">Status</strong>
						{{ $user->status }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">Tanggal Mendaftar</strong>
						{{ $user->tanggal_daftar }}
					</p>
				</div>
				<div class="d-flex text-muted pt-3">
					<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
						xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
						preserveAspectRatio="xMidYMid slice" focusable="false">
						<rect width="100%" height="100%" fill="#EFEFEF" /><text x="50%" y="50%" fill="#6f42c1"
							dy=".3em"></text>
					</svg>
					<p class="pb-3 mb-0 small lh-sm border-bottom">
						<strong class="d-block text-gray-dark">Pekerjaan</strong>
						{{ $user->pekerjaan }}
					</p>
				</div>
				<small class="d-block text-end mt-3">
					<a href="{{ route('user.setting') }}" class="p-3">Ubah Informasi Akun</a>
				</small>
			</div>
		</div>
	</div>

@endsection