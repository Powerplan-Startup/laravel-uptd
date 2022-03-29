<template>
	<v-toolbar flat app>
		<v-app-bar-nav-icon></v-app-bar-nav-icon>
		<v-toolbar-title v-text="title"></v-toolbar-title>
		<v-autocomplete
			cache-items
			class="mx-4"
			flat
			hide-no-data
			hide-details
			label="Cari sesuatu?"
			solo-inverted
			></v-autocomplete>
		<v-btn icon>
			<v-icon>mdi-apps</v-icon>
		</v-btn>
	</v-toolbar>
</template>
<script>
export default {
	props: {
		title: {
			type: String,
			default: "Dashboard"
		}
	}
}
</script>