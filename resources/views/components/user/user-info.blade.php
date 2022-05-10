<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h5 class="border-bottom pb-2 mb-0">Mendaftar</h5>
    <div class="d-flex text-muted pt-3 mb-4">
        <div class="d-flex justify-content-center align-items-center bg-success me-2 rounded-circle" style="height: 48px; width: 48px; min-width: 48px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="#fff" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
            </svg>
        </div>
        <div class="pb-3 mb-0 small lh-smw-100">
            <div class="d-flex justify-content-between">
                <div class="alert alert-success">
                    Anda mendaftar pada tanggal {{ $user->tanggal_daftar }}
                </div>
            </div>
        </div>
    </div>
    {{-- 
        cek jika peserta bukan peserta tidak aktif --}}
    @if($user->status_peserta == "tidak_aktif")
        <h5 class="border-bottom pb-2 mb-0">Tidak Aktif</h5>
        <div class="d-flex text-muted pt-3 mb-4">
            <div class="d-flex justify-content-center align-items-center bg-danger me-2 rounded-circle" style="height: 48px; width: 48px; min-width: 48px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="#fff" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
                    <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
            </div>
            <div class="pb-3 mb-0 small lh-smw-100">
                <div class="d-flex justify-content-between">
                    <div class="alert alert-danger">
                        Anda dinyatakan Tidak Aktif, silahkan hubungi administrator untuk informasi lanjut.
                    </div>
                </div>
            </div>
        </div>
    @else
        @if($user->status_peserta == "aktif")
            <h5 class="border-bottom pb-2 mb-0">Diterima sebagai Peserta</h5>
            <div class="d-flex text-muted pt-3 mb-4">
                <div class="d-flex justify-content-center align-items-center bg-success me-2 rounded-circle" style="height: 48px; width: 48px; min-width: 48px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="#fff" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                </div>
                <div class="pb-3 mb-0 small lh-smw-100">
                    <div class="d-flex justify-content-between">
                        <div class="alert alert-success">
                            Anda berhasil diterima sebagai peserta, silahkan lihat jadwal pelatihan berikut
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="border-bottom pb-2 mb-0">Jadwal</h5>
            <div class="d-flex text-muted pt-3 mb-4">
                <div class="d-flex justify-content-center align-items-center bg-info me-3 rounded-circle" style="height: 48px; width: 48px; min-width: 48px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="#fff" class="bi bi-calendar-event" viewBox="0 0 16 16">
                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>
                </div>
                <div class="pb-3 mb-0 w-100">
                    <h6 class="border-bottom pb-2 mb-0">Jadwal Pelatihan Kejuruan {{ $kejuruan->nama_kejuruan }}</h6>
                    <div class="d-flex text-muted pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff"
                                dy=".3em"></text>
                        </svg>
            
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">Tanggal</strong>
                            </div>
                            <span class="d-block">
                                {{ $jadwal->tanggal }} 
                                {{ $jadwal->waktu }}
                            </span>
                        </div>
                    </div>
                    <a href="{{ asset('storage/' . $jadwal->materi) }}" class="d-flex text-muted pt-3 text-decoration-none" target="_blank">
                        <div class="d-flex justify-content-center align-items-center bg-success me-3 rounded" style="height: 32px; width: 32px; min-width: 32px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="#fff" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
                            </svg>
                        </div>
                        <div class="mb-3 small lh-sm border-bottom w-100 btn btn-success py-3 shadow">
                            {{-- <div class="d-flex justify-content-between"> --}}
                                {{-- </div> --}}
                            <span class="d-block">
                                <strong class="text-gray-dark">Lihat Silabus</strong>
                                {{-- Unduh materi --}}
                            </span>
                        </div>
                    </a>
                    <div class="d-flex text-muted pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff"
                                dy=".3em"></text>
                        </svg>
            
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">Hari</strong>
                            </div>
                            <span class="d-block">
                                {{ $jadwal->hari }}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex text-muted pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff"
                                dy=".3em"></text>
                        </svg>
            
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">Instruktur</strong>
                            </div>
                            <span class="d-block">
                                {{ $jadwal->instruktur->nama }}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex text-muted pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff"
                                dy=".3em"></text>
                        </svg>
            
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">NIP Instruktur</strong>
                            </div>
                            <span class="d-block">
                                {{ $jadwal->instruktur->nip }}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex text-muted pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff"
                                dy=".3em"></text>
                        </svg>
            
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">Telepon Instruktur</strong>
                            </div>
                            <span class="d-block">
                                {{ $jadwal->instruktur->no_hp }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($user->status_peserta == "alumni")
            <h5 class="border-bottom pb-2 mb-0">Penempatan</h5>
            <div class="d-flex text-muted pt-3 mb-4">
                <div class="d-flex justify-content-center align-items-center bg-success me-2 rounded-circle" style="height: 48px; width: 48px; min-width: 48px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="#fff" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                </div>
                <div class="pb-3 mb-0 small lh-smw-100">
                    <div class="d-flex justify-content-between">
                        <div class="alert alert-success">
                            Selamat! Anda dinyatakan berhasil menyelesaikan pelatihan
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>