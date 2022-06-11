<template>
    <div>
        <div class="d-grid-form">
            <input-pilih-kejuruan v-model="item.id_kejuruan" :errors="errors"/>
            <input-pilih-instruktur v-model="item.nip" :errors="errors"/>
        </div>
        <div>
            <v-text-field
                dense
                outlined
                v-model="item.judul"
                name="judul"
                label="Judul"
                :error-messages="errors.judul"
                @keyup="errors.judul = null"/>
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
                    v-model="item.pertemuan"
                    name="pertemuan"
                    label="Pertemuan"
                    type="number"
                    min="1"
                    :error-messages="errors.pertemuan"
                    @keyup="errors.pertemuan = null"/>
            </div>
        </div>
        <div>
            <list-input-jadwal v-model="item" :errors="errors" :id="item.id_jadwal"></list-input-jadwal>
        </div>
        <!-- <div>
            <input-pilih-materi-jadwal
                v-model="item" :errors="errors"/>
        </div> -->
    </div>
</template>
<script>
import InputPilihInstruktur from './InputPilihInstruktur.vue';
import InputPilihKejuruan from './InputPilihKejuruan.vue';
import InputPilihMateriJadwal from './InputPilihMateriJadwal.vue';
import ListInputJadwal from './ListInputJadwal.vue';
export default {
    components: { InputPilihKejuruan, InputPilihInstruktur, InputPilihMateriJadwal, ListInputJadwal },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_jadwal: null,
                    nip: null,
                    alamat: null,
                    tanggal: null,
                    waktu: null,
                    waktu_berakhir: null,
                    input_foto: null,
                    id_kejuruan: null,
                    nip: null,
                    pertemuan: 1,
                    jadwals: []
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
