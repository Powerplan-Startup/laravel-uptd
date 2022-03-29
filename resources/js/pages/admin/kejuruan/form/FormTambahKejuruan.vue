<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.nama"
                name="nama"
                label="Nama Kejuruan"
                :error-messages="errors.nama"
                @keyup="errors.nama = null"/>
            <v-text-field
                dense
                outlined
                v-model="item.nip"
                name="nip"
                label="NIP"
                :error-messages="errors.nip"
                @keyup="errors.nip = null"/>
            <v-spacer/>
            <!-- <input-foto-kejuruan
                v-model="item"
                :errors="errors"
                :foto="item.foto ? item.foto : {}"/> -->
            <v-text-field
                dense
                outlined
                v-model="item.jabatan"
                name="jabatan"
                label="Jabatan"
                :error-messages="errors.jabatan"
                @keyup="errors.jabatan = null"/>
            <v-spacer/>
            <v-text-field
                dense
                outlined
                v-model="item.pendidikan_terakhir"
                name="pendidikan_terakhir"
                label="Pendidikan Terakhir"
                :error-messages="errors.pendidikan_terakhir"
                @keyup="errors.pendidikan_terakhir = null"/>
            <v-text-field
                dense
                outlined
                v-model="item.pendidikan_profesi"
                name="pendidikan_profesi"
                label="Pendidikan Profesi"
                :error-messages="errors.pendidikan_profesi"
                @keyup="errors.pendidikan_profesi = null"/>
            <v-text-field
                dense
                outlined
                v-model="item.tempat_lahir"
                name="tempat_lahir"
                label="Tempat Lahir"
                :error-messages="errors.tempat_lahir"
                @keyup="errors.tempat_lahir = null"/>
                
            <v-dialog
                ref="tanggal_lahir"
                v-model="modal_tanggal_lahir"
                :return-value.sync="item.tanggal_lahir"
                persistent
                width="300px"
                content-class="shadow-sm rounded-xl"
                overlay-opacity=".25"
                eager>
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        dense
                        outlined
                        v-model="item.tanggal_lahir"
                        name="tanggal_lahir"
                        label="Tanggal Lahir"
                        append-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        :error-messages="errors.tanggal_lahir"/>
                </template>
                <v-date-picker v-model="item.tanggal_lahir" scrollable locale="id-id" first-day-of-week="1">
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal_tanggal_berdiri = false">
                        Batal
                    </v-btn>
                    <v-btn text color="primary" @click="$refs.tanggal_lahir.save(item.tanggal_lahir); errors.tanggal_lahir = null">
                        Pilih
                    </v-btn>
                </v-date-picker>
            </v-dialog>
            <v-text-field
                dense
                outlined
                v-model="item.telepon"
                name="telepon"
                label="Telepon"
                :error-messages="errors.telepon"
                @keyup="errors.telepon = null"/>
            <v-text-field
                dense
                outlined
                v-model="item.alamat"
                name="alamat"
                label="Alamat"
                :error-messages="errors.alamat"
                @keyup="errors.alamat = null"/>
        </div>
        <v-subheader>
            Informasi Akun
        </v-subheader>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.email"
                name="email"
                label="Email Kejuruan"
                :error-messages="errors.email"
                @keyup="errors.email = null"/>
            <v-text-field
                dense
                outlined
                v-model="password"
                name="password"
                label="Password"
                :messages="[
                    'kata sandi akan menggunakan tanggal lahir kejuruan dengan format [Tahun][Bulan][Tanggal], atau jika tanpa tanggal lahir password defaultnya adalah `password`'
                ]"
                readonly/>
        </div>
    </div>
</template>
<script>
export default {
    components: { },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_kejuruan: null,
                    nip: null,
                    alamat: null,
                    input_foto: null,
                }
            }
        }
    },
    computed: {
        item: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            },
        },
        /**
         * generate password from item.tanggal_lahir without divider
         * 
         */
        password(){
            let tanggal_lahir = this.item.tanggal_lahir;
            let password = 'password';
            if(tanggal_lahir){
                /**
                 * replace item item.tanggal_lahir special characters with nothing
                 */
                password = tanggal_lahir.replace(/[^0-9]/g, ''); 
            }
            return password;
        },
    },
    data() {
        return {
			modal_tanggal_lahir: false,
        };
    },
    methods: {}
};
</script>
