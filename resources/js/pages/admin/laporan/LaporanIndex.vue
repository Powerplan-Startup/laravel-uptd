<template>
    <div>
        <v-main>
			<admin-appbar title="Laporan"></admin-appbar>
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
                            <v-card color="indigo lighten-5 overflow-hidden" rounded="xl" flat link style="min-height: 250px" href="/print/peserta" target="_blank">
                                <div style="min-height: 125px" class="d-flex">
                                    <div class="w-100">
                                        <div class="content-middle">
                                            <v-card-text>
                                                <div class="d-flex flex-column align-center w-100">
                                                    <v-avatar color="indigo lighten-4 shadow-sm">
                                                        <v-icon v-text="'mdi-download'" color="indigo darken-1"/>
                                                    </v-avatar>
                                                    <div class="grow-1 pl-4">
                                                        <v-subheader class="indigo-text">
                                                            Laporan Peserta
                                                        </v-subheader>
                                                    </div>
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                </div>
                            </v-card>
                            <v-card color="orange lighten-5 overflow-hidden" rounded="xl" flat link href="/print/calon" target="_blank">
                                <div style="min-height: 125px" class="d-flex">
                                    <div class="w-100">
                                        <div class="content-middle">
                                            <v-card-text>
                                                <div class="d-flex flex-column align-center w-100">
                                                    <v-avatar color="orange lighten-4 shadow-sm">
                                                        <v-icon v-text="'mdi-download'" color="orange darken-1"/>
                                                    </v-avatar>
                                                    <div class="grow-1 pl-4">
                                                        <v-subheader class="orange-text">
                                                            Laporan Calon Peserta
                                                        </v-subheader>
                                                    </div>
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                </div>
                            </v-card>
                            <v-card color="indigo lighten-5 overflow-hidden" rounded="xl" flat link href="/print/alumni" target="_blank">
                                <div style="min-height: 125px" class="d-flex">
                                    <div class="w-100">
                                        <div class="content-middle">
                                            <v-card-text>
                                                <div class="d-flex flex-column align-center w-100">
                                                    <v-avatar color="indigo lighten-4 shadow-sm">
                                                        <v-icon v-text="'mdi-download'" color="indigo darken-1"/>
                                                    </v-avatar>
                                                    <div class="grow-1 pl-4">
                                                        <v-subheader class="indigo-text">
                                                            Laporan Alumni
                                                        </v-subheader>
                                                    </div>
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                </div>
                            </v-card>
                            <v-card color="blue lighten-5 overflow-hidden" rounded="xl" flat link href="/print/instruktur" target="_blank">
                                <div style="min-height: 125px" class="d-flex">
                                    <div class="w-100">
                                        <div class="content-middle">
                                            <v-card-text>
                                                <div class="d-flex flex-column align-center w-100">
                                                    <v-avatar color="blue lighten-4 shadow-sm">
                                                        <v-icon v-text="'mdi-download'" color="blue darken-1"/>
                                                    </v-avatar>
                                                    <div class="grow-1 pl-4">
                                                        <v-subheader class="blue-text">
                                                            Laporan Instruktur
                                                        </v-subheader>
                                                    </div>
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                </div>
                            </v-card>
                            <v-card color="teal lighten-5 overflow-hidden" rounded="xl" flat link href="/print/jadwal" target="_blank">
                                <div style="min-height: 125px" class="d-flex">
                                    <div class="w-100">
                                        <div class="content-middle">
                                            <v-card-text>
                                                <div class="d-flex flex-column align-center w-100">
                                                    <v-avatar color="teal lighten-4 shadow-sm">
                                                        <v-icon v-text="'mdi-download'" color="teal darken-1"/>
                                                    </v-avatar>
                                                    <div class="grow-1 pl-4">
                                                        <v-subheader class="teal-text">
                                                            Laporan Jadwal
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
            session: 'jadwal/getSession',
        }),
        exists(){
            return this.total > 0
        }
    },
    watch: {
        '$route.name': function(val){
            if(val == 'jadwal'){
                this.show = true
            }
        },
        session(){
            this.loadItems()
        }
    },
    methods: {
        ...mapMutations({
            showTambahDialog: 'jadwal/SET_MODAL_TAMBAH',
        }),
        ...mapActions({
            showUbahDialog: 'jadwal/setModalUbah',
            showHapusDialog: 'jadwal/setModalHapus',
            getItems: 'jadwal/get',
        }),
        openModalTambah(){
            this.showTambahDialog(true)
        },
        ubahInfoJadwal(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoJadwal(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItems(){
            this.loading = true
            let res = await this.getItems({
                itemsPerPage: 1,
                sortBy: ['created_at'],
                sortDesc: [true],
            }).catch(e => {
                console.log("loadItem@JadwalIndex.vue", e);
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