<template>
    <div>
        <v-dialog v-model="dialog" max-width="400" content-class="shadow-sm" overlay-opacity=".25" eager scrollable persistent>
            <v-form @submit.prevent="submit" :disabled="loading">
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Ubah Data Peserta > {{ item.nama }}
                        </v-subheader>
                        <v-spacer/>
                        <v-avatar color="grey lighten-3">
                            <v-icon>mdi-school</v-icon>
                        </v-avatar>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text v-if="dialog && exists">
                        <form-tambah-peserta v-model="item" :errors="errors"/>
                    </v-card-text>
                    <v-card-text v-else-if="dialog && loading">
                        <form-tambah-peserta-placeholder/>
                    </v-card-text>
                    <v-divider/>
                    <v-card-actions>
                        <v-btn text @click="dialog = false" :loading="loading">
                            Batal
                        </v-btn>
                        <v-spacer/>
                        <v-btn text color="primary" type="submit" :loading="loading">
                            Simpan
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-form>
        </v-dialog>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import FormTambahPeserta from './form/FormTambahPeserta.vue'
import FormTambahPesertaPlaceholder from './form/FormTambahPesertaPlaceholder.vue'
export default {
    components: { FormTambahPeserta, FormTambahPesertaPlaceholder },
    data(){
        return {
            loading: false,
            errors: {},
            item: {},
            ori: {},
            exists: false,
        }
    },
    computed: {
        ...mapState({
            value_dialog: state => state.peserta.modal.ubah,
            id: state => state.peserta.selected.id
        }),
        dialog: {
            get(){ return this.value_dialog },
            set(value){ this.setDialog({value}) }
        }
    },
    methods: {
        ...mapActions({
            setDialog: 'peserta/setModalUbah',
            updatePeserta: 'peserta/update',
            findPeserta: 'peserta/show',
            updateSession: 'peserta/updateSession',
            notif: 'notifikasi/show'
        }),
        async submit(e){
            let data = new FormData(e.target)
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
        async loadItem(){
            this.exists = false
            this.loading = true
            let res = await this.findPeserta({ id: this.id }).catch(e => {
                console.log("loadItem@PesertaUbah.vue", e);
                this.notif({
                    message: e.message
                })
            })
            this.loading = false
            if(res){
                this.exists = true
                for(let key in res.data.data){
                    this.$set(this.item, key, res.data.data[key])
                    this.$set(this.ori, key, res.data.data[key])
                }
            }
        }
    },
    watch: {
        value_dialog(val){
            val && this.$nextTick(e => this.loadItem())
        }
    }
}
</script>