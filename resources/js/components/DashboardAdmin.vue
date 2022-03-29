<template>
	<v-app>
		<admin-sidebar></admin-sidebar>
		<v-main app>
			<v-app-bar>
				<v-app-bar-nav-icon></v-app-bar-nav-icon>
				<v-toolbar-title>Dashboard</v-toolbar-title>
			</v-app-bar>
		</v-main>
	</v-app>
</template>

<script>
import AdminSidebar from './admin/sidebars/AdminSidebar.vue'
export default {
	components: { AdminSidebar },

}
</script>