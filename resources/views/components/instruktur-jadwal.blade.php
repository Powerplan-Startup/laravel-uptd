<div class="my-3 p-3 bg-body rounded shadow-sm">
    @if($jadwal->count() <= 0)
        <h5 class="border-bottom pb-2 mb-0">Belum Ada jadwal</h5>
        <div class="d-flex text-muted pt-3 mb-4">
            <div class="d-flex justify-content-center align-items-center bg-warning me-2 rounded-circle" style="height: 48px; width: 48px; min-width: 48px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="#fff" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
                    <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
            </div>
            <div class="pb-3 mb-0 small lh-smw-100">
                <div class="d-flex justify-content-between">
                    <div class="alert alert-warning">
                        Belum ada jadwal terbaru
                    </div>
                </div>
            </div>
        </div>
    @else
        <h5 class="border-bottom pb-2 mb-0">Jadwal</h5>
        <div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari/Tanggal</th>
                            <th>Judul Tema</th>
                            <th>Materi</th>
                            <th>Instruktur</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal as $jdw)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($jdw->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>
                                    @if(request()->route('jadwal') && request()->route('jadwal') == $jdw->id_jadwal)
                                        <input type="text" class="form-control" name="judul" value="{{ $jdw->judul }}">
                                    @else
                                        {{ $jdw->judul }}</td>
                                    @endif
                                <td>
                                    @if(request()->route('jadwal') && request()->route('jadwal') == $jdw->id_jadwal)
    
                                        <div>
                                            <input type="file" class="form-control">
                                        </div>
    
                                        @if($jdw->materi != null)
                                            <div>
                                                <a href="{{ asset('storage/materi/'.$jdw->materi) }}" target="_blank">
                                                    Unduh materi
                                                </a>
                                            </div>
                                        @endif
    
                                    @elseif($jdw->materi != null)
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
                                <td>
                                    @if(request()->route('jadwal') && request()->route('jadwal') == $jdw->id_jadwal)
                                        <button class="btn btn-success btn-sm d-block w-100" type="submit">
                                            Simpan
                                        </button>
                                    @else
                                        <a href="{{ route('instruktur.materi', ['jadwal' => $jdw->id_jadwal]) }}" class="btn btn-primary btn-sm">
                                            Unggah Berkas
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    @endif
</div>