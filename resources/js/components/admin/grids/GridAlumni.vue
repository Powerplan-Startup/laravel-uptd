<template>
	<v-card flat color="indigo lighten-5" rounded="xl" link :to="{ name: 'peserta' }" style="min-height: 250px">
		<v-card-text class="content-middle">
			<div>
				Total Alumni
			</div>
			<v-slide-y-reverse-transition mode="out-in">
				<div class="text-h3" :key="total">
					{{ total | number }}
				</div>
			</v-slide-y-reverse-transition>
		</v-card-text>
	</v-card>
</template>
<script>
import { mapActions } from 'vuex'
export default {
	data(){
		return {
			total: 0
		}
	},
	methods: {
		...mapActions({
			getItem: 'peserta/get',
		}),
		async loadItem(){
			let res = await this.getItem({
                status: 'alumni',
			}).catch(err => {
				console.error(err)
			})
			if(res){
				this.total = res.data?.meta?.total
			}
		},
	},
	created(){
		this.loadItem()
	},
}
</script>