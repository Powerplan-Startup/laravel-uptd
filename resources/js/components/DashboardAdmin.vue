<template>
	<v-app>
		<admin-sidebar></admin-sidebar>
        <router-view></router-view>
		<notification></notification>
	</v-app>
</template>

<script>
import AdminSidebar from './admin/sidebars/AdminSidebar.vue'
import AdminAppbar from './admin/appbars/AdminAppbar.vue'
import Notification from './admin/notification/Notification.vue'
import { mapActions } from 'vuex'
export default {
	components: { AdminSidebar, AdminAppbar, Notification },
	methods: {
		...mapActions({
		})
	},
	async created(){
	}
}
</script>