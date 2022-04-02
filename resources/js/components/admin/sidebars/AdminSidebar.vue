<template>
	<v-navigation-drawer light width="300" app>
		<div class="pa-3">
			<v-card dark rounded="lg" class="p5-10 shadow-sm" color="indigo">
				<v-list-item>
					<v-list-item-avatar color="indigo lighten-2">
						<v-icon>mdi-account</v-icon>
					</v-list-item-avatar>
					<v-list-item-content>
						<v-list-item-title>
							Nama Pengguna
						</v-list-item-title>
						<v-list-item-subtitle>
							@namapengguna
						</v-list-item-subtitle>
					</v-list-item-content>
					<v-list-item-action title="Keluar">
						<v-btn icon>
							<v-icon>mdi-power</v-icon>
						</v-btn>
					</v-list-item-action>
				</v-list-item>
				<v-divider></v-divider>
				<v-list-item link>
					<v-list-item-content>
						<v-list-item-title>
							Lihat Website
						</v-list-item-title>
						<v-list-item-subtitle>
							Kunjungi halaman awal
						</v-list-item-subtitle>
					</v-list-item-content>
					<v-list-item-action>
						<v-btn icon>
							<v-icon>mdi-arrow-right</v-icon>
						</v-btn>
					</v-list-item-action>
				</v-list-item>
			</v-card>
		</div>
		<v-divider></v-divider>
		<!-- <v-subheader>
			Menu
		</v-subheader> -->
		<v-list nav dense>
			<v-list-item :to="{ name: 'admin' }" exact color="primary">
				<v-list-item-icon>
					<v-icon>mdi-home</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Dashboard
					</v-list-item-title>
					<v-list-item-subtitle>
						Halaman awal penal admin
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			<v-list-item :to="{ name: 'kejuruan' }" color="primary">
				<v-list-item-icon>
					<v-icon>mdi-bookmark</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Kejuruan
					</v-list-item-title>
					<v-list-item-subtitle>
						Kelola Kejuruan
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			<v-list-item :to="{ name: 'instruktur' }" color="primary">
				<v-list-item-icon>
					<v-icon>mdi-account-tie</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Instruktur
					</v-list-item-title>
					<v-list-item-subtitle>
						Kelola Instruktur
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			<v-list-item :to="{ name: 'jadwal' }" color="primary">
				<v-list-item-icon>
					<v-icon>mdi-calendar</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Jadwal
					</v-list-item-title>
					<v-list-item-subtitle>
						Kelola Jadwal Pelatihan
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			<v-list-item :to="{ name: 'peserta' }" color="primary">
				<v-list-item-icon>
					<v-icon>mdi-account-group</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Peserta
					</v-list-item-title>
					<v-list-item-subtitle>
						Kelola Daftar Peserta
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			<v-list-item :to="{ name: 'laporan' }" color="primary" exact>
				<v-list-item-icon>
					<v-icon>mdi-printer</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Laporan
					</v-list-item-title>
					<v-list-item-subtitle>
						Lihat & Cetak Laporan
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
		</v-list>
	</v-navigation-drawer>
</template>

<script>
export default {

}
</script>