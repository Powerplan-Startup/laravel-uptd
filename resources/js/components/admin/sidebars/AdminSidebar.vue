<template>
	<v-navigation-drawer light width="300" app v-model="menu">
		<div class="pa-3">
			<v-card dark rounded="lg" class="p5-10 shadow-sm" color="indigo">
				<v-list-item v-if="user.id_admin != null">
					<v-list-item-avatar color="indigo lighten-2">
						<v-icon>mdi-account</v-icon>
					</v-list-item-avatar>
					<v-list-item-content>
						<v-list-item-title>
							{{ user.nama }}
						</v-list-item-title>
						<v-list-item-subtitle>
							{{ user.username }}
						</v-list-item-subtitle>
					</v-list-item-content>
					<v-list-item-action title="Keluar">
						<v-btn icon link href="/admin/logout">
							<v-icon>mdi-power</v-icon>
						</v-btn>
					</v-list-item-action>
				</v-list-item>
				<v-divider></v-divider>
				<v-list-item link href="/" target="_blank">
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
			<v-list-item :to="{ name: 'berita' }" color="primary">
				<v-list-item-icon>
					<v-icon>mdi-newspaper</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Berita
					</v-list-item-title>
					<v-list-item-subtitle>
						Kelola Berita
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
import { mapMutations, mapState } from 'vuex'
export default {
	computed: {
		menu: {
			set(val){
				this.setSidebar(val)
			},
			get(){ return this.sidebar }
		},
		...mapState({
			user: state => state.auth.user,
			sidebar: state => state.app.sidebar
		})
	},
	methods: {
		...mapMutations({
			setSidebar: 'app/setSidebar'
		})
	}
}
</script>