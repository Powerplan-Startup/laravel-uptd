<template>
    <div>
        <v-dialog v-model="dialog" max-width="600" content-class="shadow-sm" overlay-opacity=".25" eager scrollable>
            <v-form @submit.prevent="submit" :disabled="loading">
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Form Tambah Berita
                        </v-subheader>
                        <v-spacer/>
                        <v-avatar color="grey lighten-3">
                            <v-icon>mdi-newspaper</v-icon>
                        </v-avatar>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text v-if="dialog || alive">
                        <form-tambah-berita :errors="errors"/>
                    </v-card-text>
                    <v-divider/>
                    <v-card-actions>
                        <v-spacer/>
                        <v-btn text color="primary" type="submit" :loading="loading">
                            Tambah
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-form>
        </v-dialog>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import FormTambahBerita from './form/FormTambahBerita.vue'
export default {
  components: { FormTambahBerita },
    data(){
        return {
            loading: false,
            errors: {},
            alive: true,
        }
    },
    computed: {
        ...mapState({
            value_dialog: state => state.berita.modal.tambah
        }),
        dialog: {
            get(){ return this.value_dialog },
            set(val){ this.setDialog(val) }
        }
    },
    methods: {
        ...mapMutations({
            setDialog: 'berita/SET_MODAL_TAMBAH'
        }),
        ...mapActions({
            storeGuru: 'berita/store',
            updateSession: 'berita/updateSession',
            notif: 'notifikasi/show'
        }),
        async submit(e){
            let data = new FormData(e.target)
            this.loading = true
            let res = await this.storeGuru(data).catch(e => {
                console.log("storeGuru@GuruTambah.vue", e);
                e.response.status == 422 && this.setErrorForm(e)
                this.notif({
                    message: e.message
                })
            })
            this.loading = false
            console.log(res);
            if(res){
                this.dialog = false
                this.alive = false
                this.updateSession()
            }
        }
    },
    watch: {
        dialog(val){
            if(val)
                this.alive = true
        }
    }
}
</script>