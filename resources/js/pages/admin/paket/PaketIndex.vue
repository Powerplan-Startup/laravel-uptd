<template>
    <div>
        <v-main>
			<admin-appbar title="Paket"></admin-appbar>
            <v-container class="pa-10">
                <div v-if="loading">
                    <div class="d-grid-main">
                        <v-card v-for="i in 3" :key="i" color="grey lighten-4 overflow-hidden" flat rounded="xl">
                            <div style="min-height: 125px">
                                <v-card-text>
                                    <v-skeleton-loader type="avatar" loading/>
                                </v-card-text>
                            </div>
                        </v-card>
                    </div>
                </div>
                <div v-else style="position: relative">
                    <v-expand-transition>
                        <div class="d-grid-main" v-if="show">
                            <v-card color="indigo lighten-5 overflow-hidden" rounded="xl" flat link :to="{ name: '.list' }">
								<div class="d-flex">
									<v-card-text>
										<div class="d-flex w-100">
											<v-avatar color="indigo lighten-4">
												<v-icon>mdi-pin</v-icon>
											</v-avatar>
											<v-spacer/>
										</div>
									</v-card-text>
									<div class="grow">
										<v-card-text class="text-h2 text-right">
											{{ total }}
										</v-card-text>
										<v-card-text class="text-right pt-0">
											Total Paket
										</v-card-text>
									</div>
								</div>
                            </v-card>
                            <div></div>
                            <v-card color="pink lighten-5 overflow-hidden" rounded="xl" flat link @click="openModalTambah">
                                <div style="min-height: 125px" class="d-flex">
                                    <div class="w-100">
                                        <div class="content-middle">
                                            <v-card-text>
                                                <div class="d-flex flex-column align-center w-100">
                                                    <v-avatar color="pink lighten-4 shadow-sm">
                                                        <v-icon v-text="'mdi-plus'" color="pink darken-1"/>
                                                    </v-avatar>
                                                    <div class="grow-1 pl-4">
                                                        <v-subheader class="pink-text">
                                                            Tambah Paket
                                                        </v-subheader>
                                                    </div>
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                </div>
                            </v-card>
                        </div>
                    </v-expand-transition>
                    <v-fab-transition>
                        <v-btn fab class="shadow" bottom absolute right dark :key="show" @click="show = !show">
                            <v-icon>mdi-chevron-{{ show ? 'up' : 'down' }}</v-icon>
                        </v-btn>
                    </v-fab-transition>
                </div>
            </v-container>
            <div class="grey lighten-5">
                <v-container>
                    <router-view no-select :data-session="session"/>
                </v-container>
            </div>
        </v-main>
    </div>
</template>
<script>
import { mapActions, mapGetters, mapMutations, mapState } from 'vuex'
import AdminAppbar from '../../../components/admin/appbars/AdminAppbar.vue'
export default {
  components: { AdminAppbar },
    data(){
        return {
            loading: false,
            items: [],
            total: 0,
            show: true,
        }
    },
    computed: {
        ...mapState({}),
        ...mapGetters({
            session: 'paket/getSession',
        }),
        exists(){
            return this.total > 0
        }
    },
    watch: {
        '$route.name': function(val){
            if(val == 'paket'){
                this.show = true
            }
        },
        session(){
            this.loadItems()
        }
    },
    methods: {
        ...mapMutations({
            showTambahDialog: 'paket/SET_MODAL_TAMBAH',
        }),
        ...mapActions({
            showUbahDialog: 'paket/setModalUbah',
            showHapusDialog: 'paket/setModalHapus',
            getItems: 'paket/get',
        }),
        openModalTambah(){
            this.showTambahDialog(true)
        },
        ubahInfoPaket(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoPaket(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItems(){
            this.loading = true
            let res = await this.getItems({
                itemsPerPage: 1,
                sortBy: ['created_at'],
                sortDesc: [true],
            }).catch(e => {
                console.log("loadItem@PaketIndex.vue", e);
            });
            this.loading = false
            if(res?.data?.data){
                this.items = res.data.data;
                this.total = res?.data?.meta?.total || 0;
            }
        }
    },
    created(){
        this.loadItems()
    }
}
</script>