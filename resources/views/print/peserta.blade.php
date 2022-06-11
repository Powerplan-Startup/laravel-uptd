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
	<table class="table">
		<tr>
			<th>
				Laporan Peserta
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
					Nama
				</th>
				<th>
					TTL
				</th>
				<th>
					Jenis Kelamin
				</th>
				<th>
					Alamat
				</th>
				<th>
					No. HP
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($kejuruan as $item)
				<tr>
					<td colspan="6" style="background-color: yellow">
						Kejuruan {{ $item->nama_kejuruan }}
					</td>
				</tr>
				@forelse ($item->peserta as $peserta)
					<tr class="small">
						<td>
							{{ $loop->iteration }}
						</td>
						<td>
							{{ $peserta->nama }}
						</td>
						<td>
							{{ $peserta->tempat_lahir }},
							{{ $peserta->tanggal_lahir->format('d-m-Y') }}
						</td>
						<td>
							{{ $peserta->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}
						</td>
						<td>
							{{ $peserta->alamat }}
						</td>
						<td>
							{{ $peserta->no_hp }}
						</td>
					</tr>
				@empty
					<tr class="small">
						<td colspan="6">
							<i>
								Tidak ada peserta
							</i>
						</td>
					</tr>
				@endforelse
				<tr>
					<td colspan="5" style="background-color: #cfcfcf">
						Total
					</td>
					<td style="background-color: #cfcfcf">
						{{ $item->peserta->count() }}
					</td>
				</tr>
				<tr>
					<td colspan="6">
						...
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>