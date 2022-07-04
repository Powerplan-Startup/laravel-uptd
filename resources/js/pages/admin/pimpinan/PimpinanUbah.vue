<template>
    <div>
        <v-dialog v-model="dialog" max-width="400" content-class="shadow-sm" overlay-opacity=".25" eager scrollable persistent>
            <v-form @submit.prevent="submit" :disabled="loading">
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Form Ubah Data Pimpinan > {{ ori.judul }}
                        </v-subheader>
                        <v-spacer/>
                        <v-avatar color="grey lighten-3">
                            <v-icon>mdi-newspaper</v-icon>
                        </v-avatar>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text v-if="dialog && exists">
                        <form-tambah-pimpinan v-model="item" :errors="errors" :kategori="item.kategori" no-password/>
                    </v-card-text>
                    <v-card-text v-else-if="dialog && loading">
                        <form-tambah-pimpinan-placeholder/>
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
import FormTambahPimpinan from './form/FormTambahPimpinan.vue'
import FormTambahPimpinanPlaceholder from './form/FormTambahPimpinanPlaceholder.vue'
export default {
  components: { FormTambahPimpinan, FormTambahPimpinanPlaceholder },
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
            value_dialog: state => state.pimpinan.modal.ubah,
            id: state => state.pimpinan.selected.id
        }),
        dialog: {
            get(){ return this.value_dialog },
            set(value){ this.setDialog({value}) }
        }
    },
    methods: {
        ...mapActions({
            setDialog: 'pimpinan/setModalUbah',
            updatePimpinan: 'pimpinan/update',
            findPimpinan: 'pimpinan/show',
            updateSession: 'pimpinan/updateSession',
            notif: 'notifikasi/show'
        }),
        async submit(e){
            let data = new FormData(e.target)
            this.loading = true
            let res = await this.updatePimpinan({ data, id: this.id }).catch(e => {
                console.log("updatePimpinan@PimpinanUbah.vue", e)
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
            let res = await this.findPimpinan({ id: this.id }).catch(e => {
                console.log("loadItem@PimpinanUbah.vue", e);
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