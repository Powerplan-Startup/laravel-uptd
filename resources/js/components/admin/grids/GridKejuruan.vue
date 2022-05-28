<template>
	<v-card :color="'blue lighten-4'" rounded="xl" flat link :to="{ name: 'kejuruan' }" style="min-height: 250px">
		<div class="d-flex">
			<v-card-text>
				<div class="d-flex w-100">
					<v-avatar :color="'blue lighten-2'">
						<v-icon>mdi-bookmark</v-icon>
					</v-avatar>
					<v-spacer/>
				</div>
			</v-card-text>
			<div class="grow">
				<v-card-text class="text-h2 text-right">
					<v-slide-y-reverse-transition mode="out-in">
						<div class="text-h3" :key="total">
							{{ total | number }}
						</div>
					</v-slide-y-reverse-transition>
				</v-card-text>
				<v-card-text class="text-right pt-0">
					Kejuruan
				</v-card-text>
			</div>
		</div>
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
			getItem: 'kejuruan/get',
		}),
		async loadItem(){
			let res = await this.getItem({}).catch(err => {
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