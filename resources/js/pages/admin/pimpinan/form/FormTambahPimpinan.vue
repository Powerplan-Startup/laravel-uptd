<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.judul"
                name="judul"
                label="Judul Pimpinan"
                :error-messages="errors.judul"
                @keyup="errors.judul = null"/>
            <v-text-field
                dense
                outlined
                v-model="item.deskripsi"
                name="deskripsi"
                label="Deskripsi Pimpinan"
                :error-messages="errors.deskripsi"
                @keyup="errors.deskripsi = null"
                counter="191"/>
    
            <!-- <input-terbit-pimpinan
                v-model="item.terbit" 
                :errors="errors" 
                @change="errors.terbit = null"/> -->
    
        </div>
        <input-cover-pimpinan v-model="item" :errors="errors" :cover="item.cover_url"></input-cover-pimpinan>
        <input-pimpinan
            v-model="item.isi"/>
    </div>
</template>
<script>
import InputTerbitPimpinan from './InputTerbitPimpinan.vue';
import InputPimpinan from './InputPimpinan.vue';
import InputCoverPimpinan from './InputCoverPimpinan.vue';
export default {
    components: { InputTerbitPimpinan, InputPimpinan, InputCoverPimpinan },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_guru: null,
                    nip: null,
                    alamat: null,
                }
            }
        },
        kategori: {
            type: Object
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
        is_pengumuman(){
            return this.kategori && this.kategori.nama_kategori.toLocaleLowerCase() == 'pengumuman'
        }
    },
    data() {
        return {
			modal_tanggal_lahir: false,
        };
    },
    methods: {}
};
</script>
