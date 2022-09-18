<div class="my-3 p-3 bg-body rounded shadow-sm">
    @if($peserta->count() <= 0)
        <h5 class="border-bottom pb-2 mb-0">Peserta Kosong</h5>
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
                        Belum ada peserta
                    </div>
                </div>
            </div>
        </div>
    @else
        <h5 class="border-bottom pb-2 mb-0">Penilaian Peserta</h5>
        <div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">No. Peserta</th>
                            <th rowspan="2">Peserta</th>
                            <th colspan="2">Nilai Sikap</th>
                            <th colspan="2">Nilai Akademis</th>
                            <th rowspan="2">Jumlah Nilai Akhir</th>
                            <th rowspan="2">Predikat</th>
                            <th rowspan="2">Ranking</th>
                            <th rowspan="2">Keterangan</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th>Rata-Rata</th>
                            <th>Bobot</th>
                            <th>Rata-Rata</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peserta as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->nomor_peserta }}
                                </td>
                                <td>
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        <input type="number" step="0.01" class="form-control" name="nilai_sikap_rerata" value="{{ $item->nilai->nilai_sikap_rerata }}">
                                    @else
                                        {{ $item->nilai->nilai_sikap_rerata }}
                                    @endif
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        {{ $item->nilai->nilai_sikap_bobot * 100 }}%
                                    @else
                                        {{ $item->nilai->nilai_sikap_rerata * $item->nilai->nilai_sikap_bobot }}
                                    @endif
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        <input type="number" step="0.01" class="form-control" name="nilai_akademis_rerata" value="{{ $item->nilai->nilai_akademis_rerata }}">
                                    @else
                                        {{ $item->nilai->nilai_akademis_rerata }}
                                    @endif
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        {{ $item->nilai->nilai_akademis_bobot * 100 }}%
                                    @else
                                        {{ $item->nilai->nilai_akademis_rerata * $item->nilai->nilai_akademis_bobot }}
                                    @endif
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        <div></div>
                                    @else
                                        {{ $item->nilai->jumlah }}
                                    @endif
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        <div></div>
                                    @else
                                        {{ $item->nilai->predikat }}
                                    @endif
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        <div></div>
                                    @else
                                        {{ $item->nilai->ranking }}
                                    @endif
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        <div></div>
                                    @else
                                        {{ $item->nilai->keterangan }}
                                    @endif
                                </td>
                                <td>
                                    @if(request()->route('peserta') && request()->route('peserta') == $item->nomor_peserta)
                                        <button class="btn btn-success btn-sm d-block w-100" type="submit">
                                            Simpan
                                        </button>
                                    @else
                                        <a href="{{ route('instruktur.nilai.peserta', [ 'paket' => $item->id_paket, 'peserta' => $item->nomor_peserta ]) }}" class="btn btn-primary btn-sm">
                                            Ubah Nilai
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