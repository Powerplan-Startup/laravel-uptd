<template>
    <div>
        <v-dialog v-model="dialog" max-width="400" content-class="shadow-sm" overlay-opacity=".25" eager scrollable persistent>
            <v-form @submit.prevent="submit" :disabled="loading">
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Konfirmasi Hapus data Jadwal > #{{ item.id_jadwal }}
                        </v-subheader>
                        <v-spacer/>
                        <v-avatar color="error lighten-5">
                            <v-icon color="error">mdi-calendar-remove</v-icon>
                        </v-avatar>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text v-if="dialog">
                        <v-alert type="error" text prominent rounded="xl">
                            Data yang sudah dihapus tidak dapat dikembalikan
                        </v-alert>
                    </v-card-text>
                    <v-divider/>
                    <v-card-actions>
                        <v-btn text @click="dialog = false" :loading="loading">
                            Batal
                        </v-btn>
                        <v-spacer/>
                        <v-btn text color="error" type="submit" :loading="loading">
                            Hapus
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-form>
        </v-dialog>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
export default {
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
            value_dialog: state => state.jadwal.modal.hapus,
            id: state => state.jadwal.selected.id
        }),
        dialog: {
            get(){ return this.value_dialog },
            set(value){ this.setDialog({value}) }
        }
    },
    methods: {
        ...mapActions({
            setDialog: 'jadwal/setModalHapus',
            deleteJadwal: 'jadwal/destroy',
            findJadwal: 'jadwal/show',
            updateSession: 'jadwal/updateSession',
            notif: 'notifikasi/show'
        }),
        async submit(e){
            let data = new FormData(e.target)
            this.loading = true
            let res = await this.deleteJadwal({ data, id: this.id }).catch(e => {
                console.log("deleteJadwal@JadwalTambah.vue", e);
                if(e.response.status == 422)
                    this.errors = e.response.data.errors
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
            let res = await this.findJadwal({ id: this.id }).catch(e => {
                console.log("loadItem@JadwalTambah.vue", e);
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