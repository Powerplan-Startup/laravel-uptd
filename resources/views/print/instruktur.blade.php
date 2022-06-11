<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan Instruktur</title>
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
				Laporan Instruktur
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
			@forelse ($instruktur as $item)
				<tr class="small">
					<td>
						{{ $loop->iteration }}
					</td>
					<td>
						{{ $item->nama }}
					</td>
					<td>
						{{ $item->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}
					</td>
					<td>
						{{ $item->alamat }}
					</td>
					<td>
						{{ $item->no_hp }}
					</td>
				</tr>
			@empty
				<tr class="small">
					<td colspan="7">
						<i>
							Tidak ada instruktur
						</i>
					</td>
				</tr>
			@endforelse
			<tr>
				<td colspan="4" style="background-color: #cfcfcf">
					Total
				</td>
				<td style="background-color: #cfcfcf">
					{{ $instruktur->count() }}
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>