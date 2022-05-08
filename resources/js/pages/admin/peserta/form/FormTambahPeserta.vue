<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.nama"
                name="nama"
                label="Nama Peserta"
                disabled
                :error-messages="errors.nama"
                @keyup="errors.nama = null"/>
            <input-status-peserta v-model="item.status_peserta" :errors="errors"></input-status-peserta>
        </div>
    </div>
</template>
<script>
import InputStatusPeserta from './InputStatusPeserta.vue';
export default {
    components: {InputStatusPeserta },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_peserta: null,
                    nip: null,
                    alamat: null,
                    status_peserta: null,
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
