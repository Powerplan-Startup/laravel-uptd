<template>
	<v-main>
		<admin-appbar />
		<div class="pa-lg-10 pa-3">
			<v-card flat rounded="xl" color="grey lighten-4">
				<v-card-title>
					Selamat datang!
				</v-card-title>
				<v-card-text>
					Anda dapat mengelola data pada aplikasi menggunakan navigasi pada sebelah kiri halaman
				</v-card-text>
			</v-card>
		</div>
		<div
			class="pa-lg-10 pt-lg-0 pt-0 pa-3 d-grid-main">
			<grid-peserta></grid-peserta>
			<grid-alumni></grid-alumni>
			<grid-calon-peserta style="grid-row: span 2"></grid-calon-peserta>
			<!-- replace with -->
			<grid-alumni></grid-alumni>
			<grid-alumni></grid-alumni>
		</div>
	</v-main>
</template>
<script>
import AdminAppbar from '../../components/admin/appbars/AdminAppbar.vue'
import GridPeserta from '../../components/admin/grids/GridPeserta.vue'
import GridAlumni from '../../components/admin/grids/GridAlumni.vue'
import GridCalonPeserta from '../../components/admin/grids/GridCalonPeserta.vue'
export default {
	components: { AdminAppbar, GridPeserta, GridAlumni, GridCalonPeserta },

}
</script>