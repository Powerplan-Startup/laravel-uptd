<template>
    <div>
        <v-main>
			<admin-appbar title="Instruktur"></admin-appbar>
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
											Total Instruktur
										</v-card-text>
									</div>
								</div>
                            </v-card>
                            <div class="d-lg-block d-none">
                                <div class="d-grid-main mini fill-height">
									<v-card class="grey lighten-4 overflow-hidden" flat rounded="xl">
										<v-card-text class="content-middle">
											<v-subheader>
												Terbaru
											</v-subheader>
										</v-card-text>
									</v-card>
                                    <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link v-for="(item, i) in items" :key="item.id_instruktur" :to="{ name: 'instruktur.show', params: { id_instruktur: item.id_instruktur } }">
                                        <v-card-text>
                                            <div class="d-flex w-100">
                                                <v-spacer/>
                                                <v-menu open-on-click content-class="shadow-sm rounded-lg" :close-on-content-click="false">
                                                    <template #activator="{ attrs, on }">
                                                        <v-btn icon v-on="on" v-bind="attrs" @click.prevent="">
                                                            <v-icon>mdi-dots-vertical</v-icon>
                                                        </v-btn>
                                                    </template>
                                                    <v-list nav>
                                                        <v-subheader v-text="'Aksi'"/>
                                                        <v-list-item dense link :to="{ name: 'instruktur.show', params: { id_instruktur: item.id_instruktur }}">
                                                            <v-list-item-icon>
                                                                <v-icon>mdi-account-tie</v-icon>
                                                            </v-list-item-icon>
                                                            <v-list-item-content>
                                                                <v-list-item-title>
                                                                    Lihat Rincian
                                                                </v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>
                                                        <v-list-item dense link @click="ubahInfoInstruktur(item.id_instruktur)">
                                                            <v-list-item-icon>
                                                                <v-icon>mdi-pencil</v-icon>
                                                            </v-list-item-icon>
                                                            <v-list-item-content>
                                                                <v-list-item-title>
                                                                    Ubah
                                                                </v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>
                                                        <v-list-item dense link @click="hapusInfoInstruktur(item.id_instruktur)">
                                                            <v-list-item-icon>
                                                                <v-icon>mdi-delete</v-icon>
                                                            </v-list-item-icon>
                                                            <v-list-item-content>
                                                                <v-list-item-title>
                                                                    Hapus
                                                                </v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>
                                                        <v-subheader v-text="'Rincian'"/>
                                                        <v-list-item dense>
                                                            <v-list-item-icon>
                                                                <v-icon>mdi-calendar</v-icon>
                                                            </v-list-item-icon>
                                                            <v-list-item-content>
                                                                <v-list-item-title>
                                                                    {{ item.created_at | datetime }}
                                                                </v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>
                                                    </v-list>
                                                </v-menu>
                                            </div>
                                        </v-card-text>
                                        <v-card-text>
                                            <div class="text-truncate">
                                                {{ item.nama_instruktur }}
                                            </div>
                                            <div class="text-truncate">
                                                <small>
                                                    {{ item.paket }}
                                                </small>
                                            </div>
                                        </v-card-text>
                                    </v-card>
                                    
                                    <div v-if="total < 1">
                                        <div v-for="i in (1 - total)" :key="`placeholder${i}`"></div>
                                    </div>
                                </div>
                            </div>
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
                                                            Tambah Instruktur
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
            session: 'instruktur/getSession',
        }),
        exists(){
            return this.total > 0
        }
    },
    watch: {
        '$route.name': function(val){
            if(val == 'instruktur'){
                this.show = true
            }
        },
        session(){
            this.loadItems()
        }
    },
    methods: {
        ...mapMutations({
            showTambahDialog: 'instruktur/SET_MODAL_TAMBAH',
        }),
        ...mapActions({
            showUbahDialog: 'instruktur/setModalUbah',
            showHapusDialog: 'instruktur/setModalHapus',
            getItems: 'instruktur/get',
        }),
        openModalTambah(){
            this.showTambahDialog(true)
        },
        ubahInfoInstruktur(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoInstruktur(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItems(){
            this.loading = true
            let res = await this.getItems({
                itemsPerPage: 1,
                sortBy: ['created_at'],
                sortDesc: [true],
            }).catch(e => {
                console.log("loadItem@InstrukturIndex.vue", e);
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