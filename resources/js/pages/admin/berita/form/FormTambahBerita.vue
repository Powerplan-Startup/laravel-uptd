<template>
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
        <v-textarea
            dense
            outlined
            v-model="item.isi"
            name="isi"
            label="Isi Berita"
            :error-messages="errors.isi"
            @keyup="errors.isi = null"/>
        <div v-if="is_pengumuman">
            <v-dialog
                ref="expired_at"
                v-model="modal_tanggal_lahir"
                :return-value.sync="item.expired_at"
                persistent
                width="300px"
                content-class="shadow-sm rounded-xl"
                overlay-opacity=".25"
                eager>
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        dense
                        outlined
                        v-model="item.expired_at"
                        name="expired_at"
                        label="Tanggal Pengumuman Berakhir"
                        append-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        :error-messages="errors.expired_at"/>
                </template>
                <v-date-picker v-model="item.expired_at" scrollable locale="id-id" first-day-of-week="1">
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal_tanggal_berdiri = false">
                        Batal
                    </v-btn>
                    <v-btn text color="primary" @click="$refs.expired_at.save(item.expired_at); errors.expired_at = null">
                        Pilih
                    </v-btn>
                </v-date-picker>
            </v-dialog>
        </div>

        <input-terbit-berita
            v-model="item.terbit" 
            :errors="errors" 
            @change="errors.terbit = null"/>

    </div>
</template>
<script>
import InputTerbitBerita from './InputTerbitBerita.vue';
export default {
    components: { InputTerbitBerita },
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
