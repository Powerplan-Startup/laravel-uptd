<template>
    <div>
        <div class="d-grid-form">
            <input-pilih-kejuruan v-model="item.id_kejuruan" :errors="errors"/>
            <input-pilih-instruktur v-model="item.nip" :errors="errors"/>
        </div>
        <div>
            <div class="d-grid-form">
                <v-text-field
                    dense
                    outlined
                    v-model="item.paket"
                    name="paket"
                    label="Paket"
                    type="number"
                    min="1"
                    :error-messages="errors.paket"
                    @keyup="errors.paket = null"/>
                <v-text-field
                    dense
                    outlined
                    v-model="item.tahun"
                    name="tahun"
                    label="Tahun"
                    type="number"
                    min="2020"
                    :counter="4"
                    :error-messages="errors.tahun"
                    @keyup="errors.tahun = null"/>
            </div>
        </div>
        <div>
            <input-paket v-model="item" :errors="errors"></input-paket>
        </div>
        <!-- <div>
            <input-pilih-materi-paket
                v-model="item" :errors="errors"/>
        </div> -->
    </div>
</template>
<script>
import InputPilihInstruktur from './InputPilihInstruktur.vue';
import InputPilihKejuruan from './InputPilihKejuruan.vue';
import InputPilihMateriPaket from './InputPilihMateriPaket.vue';
import ListInputPaket from './ListInputPaket.vue';
import InputPaket from './InputPaket.vue';
export default {
    components: { InputPilihKejuruan, InputPilihInstruktur, InputPilihMateriPaket, ListInputPaket, InputPaket },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_paket: null,
                    nip: null,
                    alamat: null,
                    tanggal: null,
                    waktu: null,
                    waktu_berakhir: null,
                    input_foto: null,
                    id_kejuruan: null,
                    nip: null,
                    pertemuan: 1,
                    pakets: []
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
        hari(){
            /**
             * return format hari dari tanggal menggunakan Intl.DateTimeFormat
             * 
             */
            if(this.item.tanggal){
                const date = new Date(this.item.tanggal)
                const options = { weekday: 'long' }
                return new Intl.DateTimeFormat('id-id', options).format(date)
            }
            return null;
        }
    },
    data() {
        return {
			modal_tanggal: false,
			modal_waktu: false,
			modal_waktu_berakhir: false,
        };
    },
    methods: {}
};
</script>
