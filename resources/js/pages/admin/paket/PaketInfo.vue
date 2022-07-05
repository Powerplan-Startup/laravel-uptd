<template>
    <div>
        <v-app-bar app flat floating absolute>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>
                Info Paket
            </v-toolbar-title>
        </v-app-bar>
        <v-main>
            <v-container>
                <div v-if="loading">
                    <div class="d-grid-main-info">
                        <div>
                            <v-card color="grey lighten-4 overflow-hidden" flat rounded="xl" class="mb-3">
                                <v-card-text>
                                    Memuat...
                                </v-card-text>
                            </v-card>
                            <v-card v-for="i in 1" :key="i" color="grey lighten-4 overflow-hidden" flat rounded="xl">
                                <div style="min-height: 300px">
                                    <v-card-text>
                                        <v-skeleton-loader type="avatar" loading/>
                                    </v-card-text>
                                </div>
                            </v-card>
                        </div>
                    </div>
                </div>
                <div class="mx-auto" style="max-width: 400px" v-else-if="!exists && !loading">
                    <v-alert prominent text type="warning" rounded="xl">
                        <span>
                            Info Paket Tidak Ditemukan
                        </span>
                    </v-alert>
                    <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link :to="{ name: 'paket' }">
                        <v-list-item>
                            <v-list-item-avatar color="grey lighten-2">
                                <v-icon>mdi-calendar</v-icon>
                            </v-list-item-avatar>
                            <v-list-item-content>
                                <v-list-item-title>
                                    Kembali ke daftar paket
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-card>
                </div>
                <div v-else>
                    <div class="d-grid-main-info">
                        <div>
                            <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat class="mb-3">
                                <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
                            </v-card>
                            <div class="sticky-top">
                                <v-card color="grey lighten-5 overflow-hidden" rounded="xl" flat>
                                    <v-card-text>
                                        <div class="d-flex w-100">
                                            <v-avatar color="grey lighten-2">
                                                <v-icon>mdi-calendar</v-icon>
                                            </v-avatar>
                                            <v-spacer/>
                                            <v-menu open-on-click content-class="shadow-sm rounded-lg" :close-on-content-click="false">
                                                <template #activator="{ attrs, on }">
                                                    <v-btn icon v-on.prevent="on" v-bind="attrs">
                                                        <v-icon>mdi-dots-vertical</v-icon>
                                                    </v-btn>
                                                </template>
                                                <v-list nav>
                                                    <v-subheader v-text="'Aksi'"/>
                                                    <v-list-item dense link @click="ubahInfoPaket(item.id_paket)">
                                                        <v-list-item-icon>
                                                            <v-icon>mdi-pencil</v-icon>
                                                        </v-list-item-icon>
                                                        <v-list-item-content>
                                                            <v-list-item-title>
                                                                Ubah
                                                            </v-list-item-title>
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                    <v-list-item dense link @click="hapusInfoPaket(item.id_paket)">
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
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-list-item-subtitle class="text--disabled">
                                                Paket {{ item.paket }} Pelatihan Kejuruan tahun {{ item.tahun }}
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="text-h5" v-if="item.kejuruan">
                                                {{ item.kejuruan.nama_kejuruan }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-divider/>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-account-tie</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Instruktur
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="" v-if="item.instruktur">
                                                {{ item.instruktur.nama }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                NIP.
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="" v-if="item.instruktur">
                                                {{ item.instruktur.nip }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-divider inset/>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-calendar-clock</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Tanggal Mulai Pendaftaran
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.tanggal_daftar_mulai | date }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-calendar-clock</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Tanggal Pendaftaran Berakhir
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.tanggal_daftar_selesai | date }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-divider inset/>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-calendar</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle class="">
                                                dibuat pada
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.created_at | datetime }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-card>
                            </div>
                        </div>
                        <div>
                            <div class="sticky-top" style="z-index: 1;">
                                <v-toolbar flat rounded="xl">
                                    <v-tabs align-with-title>
                                        <v-tab :to="{name: 'paket.show'}" exact>Informasi</v-tab>
                                    </v-tabs>
                                </v-toolbar>
                            </div>
                            <v-container>
                                <router-view :item="item"/>
                            </v-container>
                        </div>
                    </div>
                </div>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import { mapActions, mapGetters, mapMutations, mapState } from 'vuex'
export default {
    data(){
        return {
            loading: false,
            item: {},
            ori: {},
            exists: false,
            breadcrumb: [
                {
                    text: 'Panel Admin',
                    disabled: false,
                    to: {name: 'admin'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Paket',
                    disabled: false,
                    to: {name: 'paket'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Info Paket',
                    disabled: true,
                },
            ]
        }
    },
    computed: {
        ...mapState({
            items: state => state.paket.items,
        }),
        ...mapGetters({
            session: 'paket/getSession',
        }),
        id(){
            return this.$route.params.id_paket
        }
    },
    watch: {
        session(){
            this.loadItem()
        }
    },
    methods: {
        ...mapMutations({  }),
        ...mapActions({
            showUbahDialog: 'paket/setModalUbah',
            showHapusDialog: 'paket/setModalHapus',
            getItem: 'paket/show',
        }),
        openModalTambah(){},
        ubahInfoPaket(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoPaket(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItem(){
            this.loading = true
            this.exists = false

            let res = await this.getItem({id: this.id}).catch(e => {
                console.log("loadItem@PaketIndex.vue", e);
            });
            this.loading = false

            if(res?.data?.data){
                this.exists = true
                for(let key in res.data.data){
                    this.$set(this.item, key, res.data.data[key])
                    this.$set(this.ori, key, res.data.data[key])
                }
            }
        }
    },
    created(){
        this.loadItem()
    }
}
</script>