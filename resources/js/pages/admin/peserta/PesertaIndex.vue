<template>
    <div>
        <v-main>
			<admin-appbar title="Peserta"></admin-appbar>
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
                            <v-card class="overflow-hidden" :color="status[0].selected ? 'indigo' : 'grey lighten-4'" :dark="status[0].selected" rounded="xl" flat link @click="status[0].selected = !status[0].selected">
								<div class="d-flex">
									<v-card-text>
										<div class="d-flex w-100">
											<v-avatar :color="status[0].selected ? 'indigo lighten-1' : 'grey lighten-2'">
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
											Total Peserta
										</v-card-text>
									</div>
								</div>
                            </v-card>
                            <v-card class="overflow-hidden" :color="status[1].selected ? 'teal' : 'grey lighten-4'" :dark="status[1].selected" rounded="xl" flat link @click="status[1].selected = !status[1].selected">
								<div class="d-flex">
									<v-card-text>
										<div class="d-flex w-100">
											<v-avatar :color="status[1].selected ? 'teal lighten-1' : 'grey lighten-2'">
												<v-icon>mdi-school</v-icon>
											</v-avatar>
											<v-spacer/>
										</div>
									</v-card-text>
									<div class="grow">
										<v-card-text class="text-h2 text-right">
											{{ total_alumni }}
										</v-card-text>
										<v-card-text class="text-right pt-0">
											Total Alumni
										</v-card-text>
									</div>
								</div>
                            </v-card>
                            <div class="d-lg-block d-none">
                                <div class="d-grid-main mini fill-height">
									<v-card class="overflow-hidden" flat rounded="xl" :color="status[2].selected ? 'blue' : 'grey lighten-4'" :dark="status[2].selected" link @click="status[2].selected = !status[2].selected">
										<v-card-text class="content-middle">
											<v-subheader>
												Calon Peserta
											</v-subheader>
										</v-card-text>
									</v-card>
                                    <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link v-for="(item, i) in items" :key="item.id_peserta" :to="{ name: 'peserta.show', params: { id_peserta: item.id_peserta } }">
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
                                                        <v-list-item dense link :to="{ name: 'peserta.show', params: { id_peserta: item.id_peserta }}">
                                                            <v-list-item-icon>
                                                                <v-icon>mdi-account-tie</v-icon>
                                                            </v-list-item-icon>
                                                            <v-list-item-content>
                                                                <v-list-item-title>
                                                                    Lihat Rincian
                                                                </v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>
                                                        <v-list-item dense link @click="ubahInfoPeserta(item.id_peserta)">
                                                            <v-list-item-icon>
                                                                <v-icon>mdi-pencil</v-icon>
                                                            </v-list-item-icon>
                                                            <v-list-item-content>
                                                                <v-list-item-title>
                                                                    Ubah
                                                                </v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>
                                                        <v-list-item dense link @click="hapusInfoPeserta(item.id_peserta)">
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
                                                {{ item.nama }}
                                            </div>
                                            <div class="text-truncate">
                                                <small>
                                                    {{ item.angkatan }}
                                                </small>
                                            </div>
                                        </v-card-text>
                                    </v-card>
                                    
                                    <div v-if="total < 1">
                                        <div v-for="i in (1 - total)" :key="`placeholder${i}`"></div>
                                    </div>
                                </div>
                            </div>
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
                    <input-pilih-kejuruan @selected="id_kejuruan = $event"></input-pilih-kejuruan>
                    <router-view no-select :data-session="session" :status="status_filter" :id_kejuruan="id_kejuruan"/>
                </v-container>
            </div>
        </v-main>
    </div>
</template>
<script>
import { mapActions, mapGetters, mapMutations, mapState } from 'vuex'
import AdminAppbar from '../../../components/admin/appbars/AdminAppbar.vue'
import InputPilihKejuruan from './form/InputPilihKejuruan.vue'
export default {
  components: { AdminAppbar, InputPilihKejuruan },
    data(){
        return {
            loading: false,
            items: [],
            total: 0,
            total_alumni: 0,
            show: true,
            status: [
                { text: 'Peserta', value: 'aktif', selected: true },
                { text: 'Alumni', value: 'alumni', selected: false },
                { text: 'Calon', value: 'calon', selected: true },
                { text: 'Tidak Aktif', value: 'tidak_aktif', selected: false },
            ],
            id_kejuruan: null,
        }
    },
    computed: {
        ...mapState({}),
        ...mapGetters({
            session: 'peserta/getSession',
        }),
        status_filter(){
            return this.status.filter(item => item.selected).map(item => item.value)
        },
        exists(){
            return this.total > 0
        }
    },
    watch: {
        '$route.name': function(val){
            if(val == 'peserta'){
                this.show = true
            }
        },
        session(){
            this.loadItems()
        }
    },
    methods: {
        ...mapMutations({
            showTambahDialog: 'peserta/SET_MODAL_TAMBAH',
        }),
        ...mapActions({
            showUbahDialog: 'peserta/setModalUbah',
            showHapusDialog: 'peserta/setModalHapus',
            getItems: 'peserta/get',
            updateSession: 'peserta/updateSession'
        }),
        openModalTambah(){
            this.showTambahDialog(true)
        },
        ubahInfoPeserta(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoPeserta(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItems(){
            this.loading = true
            let res = await this.getItems({
                itemsPerPage: 1,
                sortBy: ['created_at'],
                // status: ['aktif', 'calon'],
                sortDesc: [true],
            }).catch(e => {
                console.log("loadItem@PesertaIndex.vue", e);
            }).finally(() => {
                this.loading = false
                this.loadAlumniCount()
            })
            if(res?.data?.data){
                this.items = res.data.data;
                this.total = res?.data?.meta?.total || 0;
            }
        },
        async loadAlumniCount(){
            this.loading = true
            let res = await this.getItems({
                status: ['alumni'],
            }).catch(e => {
                console.log("loadAlumniCount@PesertaIndex.vue", e);
            }).finally(() => {
                this.loading = false
            });
            if(res?.data?.meta){
                this.total_alumni = res?.data?.meta?.total || 0;
            }
        }
    },
    watch: {
        status_filter(){
            this.updateSession()
        },
        id_kejuruan(){
            this.updateSession()
        },
    },
    created(){
        this.loadItems()
    }
}
</script>