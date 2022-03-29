<template>
	<v-navigation-drawer dark color="teal lighten-1" width="300" app>
		<div class="pa-0">
			<v-card light flat rounded="0" elevation="0" color="teal lighten-5" class="py-10">
				<v-list-item>
					<v-list-item-avatar color="teal lighten-2">
						<v-icon>mdi-user</v-icon>
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
			</v-card>
		</div>
		<v-divider></v-divider>
		<v-subheader>
			Menu
		</v-subheader>
		<v-list>
			<v-list-item :to="{ name: 'admin' }" exact>
				<v-list-item-icon>
					<v-icon>mdi-home</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Dashboard
					</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
			<v-list-item :to="{ name: 'admin.kejuruan' }">
				<v-list-item-icon>
					<v-icon>mdi-bookmark</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title>
						Kejuruan
					</v-list-item-title>
				</v-list-item-content>
			</v-list-item>
		</v-list>
	</v-navigation-drawer>
</template>

<script>
export default {

}
</script>