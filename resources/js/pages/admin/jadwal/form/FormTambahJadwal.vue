<template>
    <div>
        <div class="d-grid-form">
            <v-spacer/>
            <v-text-field
                dense
                outlined
                :value="hari"
                name="hari"
                label="Hari"
                :error-messages="errors.hari"
                @keyup="errors.hari = null"
                readonly/>
            <v-dialog
                ref="tanggal"
                v-model="modal_tanggal"
                :return-value.sync="item.tanggal"
                persistent
                width="300px"
                content-class="shadow-sm rounded-xl"
                overlay-opacity=".25"
                eager>
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        dense
                        outlined
                        v-model="item.tanggal"
                        name="tanggal"
                        label="Tanggal"
                        append-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        :error-messages="errors.tanggal"/>
                </template>
                <v-date-picker v-model="item.tanggal" scrollable locale="id-id" first-day-of-week="1">
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal_tanggal = false">
                        Batal
                    </v-btn>
                    <v-btn text color="primary" @click="$refs.tanggal.save(item.tanggal); errors.tanggal = null">
                        Pilih
                    </v-btn>
                </v-date-picker>
            </v-dialog>
            <v-dialog
                ref="waktu"
                v-model="modal_waktu"
                :return-value.sync="item.waktu"
                persistent
                width="300px"
                content-class="shadow-sm rounded-xl"
                overlay-opacity=".25"
                eager>
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        dense
                        outlined
                        v-model="item.waktu"
                        name="waktu"
                        label="jam"
                        append-icon="mdi-clock"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        :error-messages="errors.waktu"/>
                </template>
                <v-time-picker v-model="item.waktu" scrollable locale="id-id" first-day-of-week="1">
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal_waktu = false">
                        Batal
                    </v-btn>
                    <v-btn text color="primary" @click="$refs.waktu.save(item.waktu); errors.waktu = null">
                        Pilih
                    </v-btn>
                </v-time-picker>
            </v-dialog>
            <input-pilih-kejuruan v-model="item.id_kejuruan" :errors="errors"/>
            <input-pilih-instruktur v-model="item.nip" :errors="errors"/>
        </div>
        <div>
            <input-pilih-materi-jadwal
                v-model="item" :errors="errors"/>
        </div>
    </div>
</template>
<script>
import InputPilihInstruktur from './InputPilihInstruktur.vue';
import InputPilihKejuruan from './InputPilihKejuruan.vue';
import InputPilihMateriJadwal from './InputPilihMateriJadwal.vue';
export default {
    components: { InputPilihKejuruan, InputPilihInstruktur, InputPilihMateriJadwal },
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
                    input_foto: null,
                    id_kejuruan: null,
                    nip: null,
                    materi: null
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
        };
    },
    methods: {}
};
</script>
