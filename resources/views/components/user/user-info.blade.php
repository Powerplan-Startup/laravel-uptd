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
            <div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hari/Tanggal</th>
                            <th>Judul Tema</th>
                            <th>Materi</th>
                            <th>NIP</th>
                            <th>No Peserta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal as $jdw)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($jdw->tanggal_pelatihan)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $jdw->judul }}</td>
                                <td>
                                    @if($jdw->materi != null)
                                        <a href="{{ asset('storage/materi/'.$jdw->materi) }}" target="_blank">
                                            Unduh materi
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            Materi belum tersedia
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        {{ optional($jdw->instruktur)->nama }}
                                    </div>
                                    <div>
                                        {{ $jdw->nip }}
                                    </div>
                                </td>
                                <td>{{ $jdw->nomor_peserta }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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