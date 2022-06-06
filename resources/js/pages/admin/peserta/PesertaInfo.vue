<template>
    <div>
        <v-app-bar app flat floating absolute>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>
                Info Peserta
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
                            Info Peserta Tidak Ditemukan
                        </span>
                    </v-alert>
                    <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link :to="{ name: 'peserta' }">
                        <v-list-item>
                            <v-list-item-avatar color="grey lighten-2">
                                <v-icon>mdi-bookmark</v-icon>
                            </v-list-item-avatar>
                            <v-list-item-content>
                                <v-list-item-title>
                                    Kembali ke daftar peserta
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
                                                <v-icon>mdi-bookmark</v-icon>
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
                                                    <v-list-item dense link @click="ubahInfoPeserta(item.nomor_peserta)">
                                                        <v-list-item-icon>
                                                            <v-icon>mdi-pencil</v-icon>
                                                        </v-list-item-icon>
                                                        <v-list-item-content>
                                                            <v-list-item-title>
                                                                Ubah
                                                            </v-list-item-title>
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                    <v-list-item dense link @click="hapusInfoPeserta(item.nomor_peserta)">
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
                                                Nama Peserta
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="text-h5">
                                                {{ item.nama }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-divider/>
                                    <v-list-item>
                                        <v-list-item-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                NIK
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.nik }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Jenis Kelamin
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Tempat Lahir
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.tempat_lahir }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Tanggal Lahir
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.tanggal_lahir | date }}
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
                                        <v-tab :to="{name: 'peserta.show'}" exact>Informasi</v-tab>
                                        <v-tab :to="{name: 'peserta.berkas'}" exact>Berkas</v-tab>
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
            <div style="position: relative">
                <v-scale-transition>
                    <v-app-bar bottom fixed dark v-show="true" rounded="xl" dense :max-width="mini ? 300 : 400" :style="bottomNavStyle" class="fab-extension shadow" :extended="false" :extension-height="0" ref="menu">
                        <v-btn @click="updateStatus('aktif')" text>
                            Terima Peserta
                        </v-btn>
                        <v-btn @click="updateStatus('tidak_aktif')" text>
                            Tolak
                        </v-btn>
                    </v-app-bar>
                </v-scale-transition>
            </div>
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
            mini: true,
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
                    text: 'Peserta',
                    disabled: false,
                    to: {name: 'peserta'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Info Peserta',
                    disabled: true,
                },
            ]
        }
    },
    computed: {
        ...mapState({
            items: state => state.peserta.items,
        }),
        ...mapGetters({
            session: 'peserta/getSession',
        }),
        id(){
            return this.$route.params.nomor_peserta
        },
		bottomNavStyle(){
			return {
				'transform': `translateX(${this.$vuetify.application.left}px) translateY(-${this.offsetBottom ? '64px' : '0px'})`,
				width: `calc(100% - ${this.$vuetify.application.right}px - ${this.$vuetify.application.left}px)`,
				margin: `1rem`,
			}
		},
    },
    watch: {
        session(){
            this.loadItem()
        }
    },
    methods: {
        ...mapMutations({  }),
        ...mapActions({
            showUbahDialog: 'peserta/setModalUbah',
            showHapusDialog: 'peserta/setModalHapus',
            getItem: 'peserta/show',
            updatePeserta: 'peserta/update',
            notif: 'notifikasi/show'
        }),
        openModalTambah(){},
        ubahInfoPeserta(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoPeserta(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItem(){
            this.loading = true
            this.exists = false

            let res = await this.getItem({id: this.id}).catch(e => {
                console.log("loadItem@PesertaIndex.vue", e);
            });
            this.loading = false

            if(res?.data?.data){
                this.exists = true
                for(let key in res.data.data){
                    this.$set(this.item, key, res.data.data[key])
                    this.$set(this.ori, key, res.data.data[key])
                }
            }
        },
        async updateStatus(status){
            let data = new FormData()
            data.append('status_peserta', status);

            this.loading = true
            let res = await this.updatePeserta({ data, id: this.id }).catch(e => {
                console.log("updatePeserta@PesertaUbah.vue", e)
                e.response.status == 422 && this.setErrorForm(e)
                this.notif({
                    message: e.message
                })
            })
            this.loading = false
            if(res){
                this.updateSession()
                this.dialog = false
            }
        },
        submit(){
        },
    },
    created(){
        this.loadItem()
    }
}
</script>

<style lang="scss">
	.fab-extension{
		display: flex;
		flex-direction: column-reverse;
		transition: all .25s ease;
		& > .v-toolbar__content{
			padding-right: 0px;
		}
	}
	.d-grid-menu{
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
		grid-auto-rows: 100px;
		width: 100%;
		gap: .25rem;
		max-height: 100%;
		overflow-y: auto;
		height: 100%;
	}
</style>