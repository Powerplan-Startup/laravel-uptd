<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.nama_jadwal"
                name="nama_jadwal"
                label="Nama Jadwal"
                :error-messages="errors.nama_jadwal"
                @keyup="errors.nama_jadwal = null"/>
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
                        label="Waktu"
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
        <div>
            <v-textarea
                dense
                outlined
                v-model="item.materi"
                name="materi"
                label="Materi"
                :error-messages="errors.materi"
                @keyup="errors.materi = null"/>
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
                    nama_jadwal: null,
                    nip: null,
                    alamat: null,
                    tanggal: null,
                    waktu: null,
                    input_foto: null,
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
