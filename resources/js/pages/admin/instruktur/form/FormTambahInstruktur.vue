<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.nip"
                name="nip"
                label="NIP Instruktur"
                :error-messages="errors.nip"
                @keyup="errors.nip = null"
                counter="18"/>
            <v-text-field
                dense
                outlined
                v-model="item.nama"
                name="nama"
                label="Nama Instruktur"
                :error-messages="errors.nama"
                @keyup="errors.nama = null"
                counter="20"/>
            <input-jenis-kelamin
                v-model="item.jenis_kelamin" 
                :errors="errors" 
                @change="errors.jenis_kelamin = null"/>
                
            <v-text-field
                dense
                outlined
                v-model="item.no_hp"
                name="no_hp"
                label="Nomor HP"
                :error-messages="errors.no_hp"
                @keyup="errors.no_hp = null"
                counter="12"
                maxlength="12"/>
            <v-text-field
                dense
                outlined
                v-model="item.alamat"
                name="alamat"
                label="Alamat"
                :error-messages="errors.alamat"
                @keyup="errors.alamat = null"
                counter="30"/>
        </div>
        <div>
            <input-foto-instruktur
                v-model="item" :errors="errors"></input-foto-instruktur>
        </div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.username"
                name="username"
                label="Username"
                :error-messages="errors.username"
                @keyup="errors.username = null"/>
            <v-text-field
                dense
                outlined
                v-model="item.password"
                name="password"
                label="Password"
                :error-messages="errors.password"
                @keyup="errors.password = null"
                type="password"/>
        </div>
    </div>
</template>
<script>
import InputFotoInstruktur from './InputFotoInstruktur.vue';
import InputJenisKelamin from './InputJenisKelamin.vue';
export default {
    components: {
        InputJenisKelamin,
        InputFotoInstruktur
    },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama: null,
                    nip: null,
                    alamat: null,
                    no_hp: null,
                    materi: null,
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
