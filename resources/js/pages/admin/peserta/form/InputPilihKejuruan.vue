<template>
	<v-card rounded="xl" color="grey lighten-5" flat class="w-100">
		<v-scale-transition leave-absolute group tag="div" class="d-flex flex-nowrap overflow-auto pa-4" mode="out-in">
			<div class="pr-3" v-for="item in items" :key="item.id_kejuruan">
				<v-card rounded="xl" class="shadow-sm item-kejuruan" :color="item.id_kejuruan == selected ? 'indigo' : null" :dark="item.id_kejuruan == selected" @click="selectItem(item)">
					<div class="d-flex flex-column justify-center fill-height">
						<v-card-text class="py-0 text-center">
							{{ item.nama_kejuruan }}
						</v-card-text>
						<v-card-text class="text-center text-h5 py-0">
							#{{ item.id_kejuruan }}
						</v-card-text>
						<v-card-text class="text-center py-0" v-if="item.jadwal">
							{{ item.jadwal.tanggal | date }}
						</v-card-text>
					</div>
				</v-card>
			</div>
		</v-scale-transition>
	</v-card>
</template>
<script>
import { mapActions, mapMutations } from 'vuex'
export default {
	props: {
	},
	data(){
		return {
			items: [],
			selected: 0,
			handler: null,
			loading: false,
		}
	},
	computed: {
		midrange(){
			return parseInt(this.range / 2)
		},
	},
	methods: {
        ...mapActions({
            getItems: 'kejuruan/get',
        }),
		selectItem(item){
			if(this.selected == item.id_kejuruan)
				return this.selected = null;
			this.selected = item.id_kejuruan
		},
        async loadItems(){
            this.loading = true
            let res = await this.getItems({
                sortBy: ['created_at'],
                sortDesc: [true],
            }).catch(e => {
                console.log("loadItem@KejuruanIndex.vue", e);
            });
            this.loading = false
            if(res?.data?.data){
                this.items = res.data.data;
                // this.total = res?.data?.meta?.total || 0;
            }
        }
	},
	watch: {
		selected(val){
			if(this.handler)
				clearTimeout(this.handler)
			this.handler = setTimeout(e => {
				this.$emit('selected', val)
			}, 800)
		}
	},
	created(){
        this.loadItems()
	}
}
</script>
<style lang="scss" scoped>
	.item-kejuruan{
		height: 100px;
		width: 100%;
		min-width: 120px;
		max-width: 120px;
	}
</style>