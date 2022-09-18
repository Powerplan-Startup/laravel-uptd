<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan Peserta</title>
	<style>
		.table {
			border-collapse: collapse;
			width: 100%;
		}
		.table th, .table td {
			border: 1px solid #000;
			padding: 8px;
		}
		.small td{
			font-size: 78%;
		}
	</style>
</head>
<body>
	{{-- <table class="table">
		<tr>
			<th>
				Laporan Peserta
			</th>
			<th style="font-size: 78%">
				{{ now() }}
			</th>
		</tr>
	</table> --}}
	<table class="table" border="1">
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
						{{ $item->nilai->nilai_sikap_rerata }}
					</td>
					<td>
						{{ $item->nilai->nilai_sikap_rerata * $item->nilai->nilai_sikap_bobot }}
					</td>
					<td>
						{{ $item->nilai->nilai_akademis_rerata }}
					</td>
					<td>
						{{ $item->nilai->nilai_akademis_rerata * $item->nilai->nilai_akademis_bobot }}
					</td>
					<td>
						{{ $item->nilai->jumlah }}
					</td>
					<td>
						{{ $item->nilai->predikat }}
					</td>
					<td>
						{{ $item->nilai->ranking }}
					</td>
					<td>
						{{ $item->nilai->keterangan }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<table style="width: 100%; margin-top: 4rem">
		<tfoot>
			<tr>
				<td colspan="11" rowspan="5"></td>
				<td width="250">Mengetahui:</td>
			</tr>
			<tr>
				<td>Pimpinan</td>
			</tr>
			<tr>
				<td style="padding: 2rem"></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td>
					<div>
						<u>
							{{ $pimpinan->nama }}
						</u>
					</div>
					<div>
						<span>
							NIP. {{ $pimpinan->nip }}
						</span>
					</div>
				</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>