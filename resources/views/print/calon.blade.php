<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan Calon Peserta</title>
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
				Laporan Calon Peserta
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
				<th>
					Tanggal Daftar
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($kejuruan as $item)
				<tr>
					<td colspan="7" style="background-color: yellow">
						Kejuruan {{ $item->nama_kejuruan }}
					</td>
				</tr>
				@if($item->getRelationValue('paket'))
					@forelse ($item->getRelationValue('paket')->peserta as $peserta)
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
							<td>
								{{ $peserta->tanggal_daftar }}
							</td>
						</tr>
					@empty
						<tr class="small">
							<td colspan="7">
								<i>
									Tidak ada peserta
								</i>
							</td>
						</tr>
					@endforelse
				@else
					<tr class="small">
						<td colspan="7">
							<i>
								Tidak ada peserta
							</i>
						</td>
					</tr>
				@endif
				<tr>
					<td colspan="6" style="background-color: #cfcfcf">
						Total
					</td>
					<td style="background-color: #cfcfcf">
						@if($item->getRelationValue('paket'))
							{{ $item->getRelationValue('paket')->peserta->count() }}
						@else
							0
						@endif
					</td>
				</tr>
				<tr>
					<td colspan="7">
						...
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