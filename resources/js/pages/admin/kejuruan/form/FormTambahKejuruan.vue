<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.nama_kejuruan"
                name="nama_kejuruan"
                label="Nama Kejuruan"
                :error-messages="errors.nama_kejuruan"
                @keyup="errors.nama_kejuruan = null"/>
            <v-text-field
                dense
                outlined
                v-model="item.paket"
                name="paket"
                label="Paket"
				type="number"
                :error-messages="errors.paket"
                @keyup="errors.paket = null"/>
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
