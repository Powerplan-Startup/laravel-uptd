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
            <v-text-field
                dense
                outlined
                v-model="item.pertemuan"
                name="pertemuan"
                label="Pertemuan"
                type="number"
                :error-messages="errors.pertemuan"
                @keyup="errors.pertemuan = null"/>
        </div>
        <div>
            <!-- <div v-for="i in item.pertemuan" :key="i"> -->
                <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, nam sequi? Doloribus, debitis reprehenderit! Laboriosam incidunt, dignissimos totam nulla voluptates, rem accusamus vel error cupiditate consectetur explicabo dolor. Aliquam, facere. -->
                <input-jadwal-pertemuan :errors="errors"/>
            <!-- </div> -->
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
import InputJadwalPertemuan from './InputJadwalPertemuan.vue';
export default {
    components: { InputPilihKejuruan, InputPilihInstruktur, InputPilihMateriJadwal, InputJadwalPertemuan },
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
