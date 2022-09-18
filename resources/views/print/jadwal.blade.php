<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan Jadwal</title>
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
	<table class="table">
		<tr>
			<th>
				Jadwal
			</th>
			<th style="font-size: 78%">
				{{ now() }}
			</th>
		</tr>
	</table>
	<table class="table" border="1">
		<thead>
			<tr>
				<th>
					No.
				</th>
				<th>
					Judul
				</th>
				<th>
					Tanggal
				</th>
				<th>
					Waktu
				</th>
				<th>
					Instruktur
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($jadwal as $item)
				<tr>
					<td colspan="3" style="background-color: yellow">
						Kejuruan {{ optional($item->paket->kejuruan)->nama_kejuruan }}
					</td>
					<td style="background-color: yellow">
						Paket (Tahun):
					</td>
					<td style="background-color: yellow">
						{{ $item->paket->paket }}
						({{ $item->paket->tahun }})
					</td>
				</tr>
				@forelse ($item->jadwals as $jadwal)
					<tr class="small">
						<td>
							{{ $loop->iteration }}
						</td>
						<td>
							{{ $jadwal->judul }}
						</td>
						<td>
							{{ $jadwal->tanggal->format('d-m-Y') }}
						</td>
						<td>
							{{ $jadwal->waktu->format('H:i') }} - {{ $jadwal->waktu_berakhir->format('H:i') }}
						</td>
						<td>
							<div>
								{{ $jadwal->instruktur->nama }}
							</div>
							<div>
								NIP.{{ $jadwal->instruktur->nip }}
							</div>
						</td>
					</tr>
				@empty
					<tr class="small">
						<td colspan="5">
							<i>
								Tidak ada jadwal
							</i>
						</td>
					</tr>
				@endforelse
				<tr>
					<td colspan="5">
						Pertemuan: {{ $item->pertemuan }}
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