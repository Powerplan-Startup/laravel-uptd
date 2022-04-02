<template>
    <div>
        <v-dialog v-model="dialog" max-width="400" content-class="shadow-sm" overlay-opacity=".4" eager scrollable>
            <v-form @submit.prevent="submit" :disabled="loading">
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Tambah Peserta
                        </v-subheader>
                        <v-spacer/>
                        <v-avatar color="grey lighten-3">
                            <v-icon>mdi-bookmark</v-icon>
                        </v-avatar>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text v-if="dialog || alive">
                        <form-tambah-peserta :errors="errors"/>
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
import FormTambahPeserta from './form/FormTambahPeserta.vue'
export default {
    components: { FormTambahPeserta },
    data(){
        return {
            loading: false,
            errors: {},
            alive: true,
        }
    },
    computed: {
        ...mapState({
            value_dialog: state => state.peserta.modal.tambah
        }),
        dialog: {
            get(){ return this.value_dialog },
            set(val){ this.setDialog(val) }
        }
    },
    methods: {
        ...mapMutations({
            setDialog: 'peserta/SET_MODAL_TAMBAH'
        }),
        ...mapActions({
            storePeserta: 'peserta/store',
            updateSession: 'peserta/updateSession',
            notif: 'notifikasi/show'
        }),
        async submit(e){
            let data = new FormData(e.target)
            this.loading = true
            let res = await this.storePeserta(data).catch(e => {
                console.log("storePeserta@PesertaTambah.vue", e);
				console.log(e);
                e.response.status == 422 && this.setErrorForm(e)
                this.notif({
                    message: e.message
                })
            }).finally(() => {
				this.loading = false
			})
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