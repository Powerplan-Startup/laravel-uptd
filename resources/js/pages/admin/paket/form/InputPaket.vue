<template>
	<div>
		<div class="d-grid-form">
			<v-dialog
				ref="tanggal_daftar_mulai"
				v-model="modal_tanggal_daftar_mulai"
				:return-value.sync="item.tanggal_daftar_mulai"
				persistent
				width="300px"
				content-class="shadow-sm rounded-xl"
				overlay-opacity=".25">
				<template v-slot:activator="{ on, attrs }">
					<v-text-field
						dense
						outlined
						v-model="item.tanggal_daftar_mulai"
						name="tanggal_daftar_mulai"
						label="Tanggal Mulai Pendaftaran"
						append-icon="mdi-calendar"
						readonly
						v-bind="attrs"
						v-on="on"
						:error-messages="errors[`tanggal_daftar_mulai`]"/>
				</template>
				<v-date-picker v-model="item.tanggal_daftar_mulai" scrollable locale="id-id" first-day-of-week="1">
					<v-spacer></v-spacer>
					<v-btn text color="primary" @click="modal_tanggal_daftar_mulai = false">
						Batal
					</v-btn>
					<v-btn text color="primary" @click="$refs.tanggal_daftar_mulai.save(item.tanggal_daftar_mulai); errors[`tanggal_daftar_mulai`] = null">
						Pilih
					</v-btn>
				</v-date-picker>
			</v-dialog>
			<v-dialog
				ref="tanggal_daftar_selesai"
				v-model="modal_tanggal_daftar_selesai"
				:return-value.sync="item.tanggal_daftar_selesai"
				persistent
				width="300px"
				content-class="shadow-sm rounded-xl"
				overlay-opacity=".25">
				<template v-slot:activator="{ on, attrs }">
					<v-text-field
						dense
						outlined
						v-model="item.tanggal_daftar_selesai"
						name="tanggal_daftar_selesai"
						label="Penutupan Pendaftaran"
						append-icon="mdi-calendar"
						readonly
						v-bind="attrs"
						v-on="on"
						:error-messages="errors[`tanggal_daftar_selesai`]"/>
				</template>
				<v-date-picker v-model="item.tanggal_daftar_selesai" scrollable locale="id-id" first-day-of-week="1">
					<v-spacer></v-spacer>
					<v-btn text color="primary" @click="modal_tanggal_daftar_selesai = false">
						Batal
					</v-btn>
					<v-btn text color="primary" @click="$refs.tanggal_daftar_selesai.save(item.tanggal_daftar_selesai); errors[`tanggal_daftar_selesai`] = null">
						Pilih
					</v-btn>
				</v-date-picker>
			</v-dialog>
		</div>
	</div>
</template>
<script>
export default {
    props: {
        errors: Object,
		index: Number,
        value: {
            type: Object,
            default: ()=>{
                return {
                    paket: null,
                    nip: null,
                    tanggal_daftar_mulai: null,
                    tanggal_daftar_selesai: null,
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
             * return format hari dari tanggal_daftar_mulai menggunakan Intl.DateTimeFormat
             * 
             */
            if(this.item.tanggal_daftar_mulai){
                const date = new Date(this.item.tanggal_daftar_mulai)
                const options = { weekday: 'long' }
                return new Intl.DateTimeFormat('id-id', options).format(date)
            }
            return null;
        }
    },
    data() {
        return {
			modal_tanggal_daftar_mulai: false,
			modal_tanggal_daftar_selesai: false,
        };
    },
}
</script>
<style>

</style>