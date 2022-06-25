<template>
	<v-toolbar flat app>
		<v-app-bar-nav-icon @click="menu = !menu"></v-app-bar-nav-icon>
		<v-toolbar-title v-text="title"></v-toolbar-title>
		<v-spacer></v-spacer>
		<!-- <v-autocomplete
			cache-items
			class="mx-4"
			flat
			hide-no-data
			hide-details
			label="Cari sesuatu?"
			solo-inverted
			style="max-width: 400px"
			></v-autocomplete> -->
		<v-btn icon>
			<v-icon>mdi-apps</v-icon>
		</v-btn>
	</v-toolbar>
</template>
<script>
import { mapMutations, mapState } from 'vuex'
export default {
	props: {
		title: {
			type: String,
			default: "Dashboard"
		}
	},
	computed: {
		menu: {
			set(val){
				this.setSidebar(val)
			},
			get(){ return this.sidebar }
		},
		...mapState({
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