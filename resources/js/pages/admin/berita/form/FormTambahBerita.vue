<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.judul"
                name="judul"
                label="Judul Berita"
                :error-messages="errors.judul"
                @keyup="errors.judul = null"/>
            <v-text-field
                dense
                outlined
                v-model="item.deskripsi"
                name="deskripsi"
                label="Deskripsi Berita"
                :error-messages="errors.deskripsi"
                @keyup="errors.deskripsi = null"
                counter="191"/>
    
            <!-- <input-terbit-berita
                v-model="item.terbit" 
                :errors="errors" 
                @change="errors.terbit = null"/> -->
    
        </div>
        <input-berita
            v-model="item.isi"/>
    </div>
</template>
<script>
import InputTerbitBerita from './InputTerbitBerita.vue';
import InputBerita from './InputBerita.vue';
export default {
    components: { InputTerbitBerita, InputBerita },
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
