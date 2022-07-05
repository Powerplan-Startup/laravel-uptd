<template>
	<div>
		<div v-for="i in parseInt(item.pertemuan)" :key="i">
			<div class="mb-2">
				Petemuan ke-{{ i }}
			</div>
			<div v-if="item.jadwals && item.jadwals.length">
				<input-jadwal-pertemuan :errors="errors" :index="i-1" v-model="item.jadwals[i-1]"/>
			</div>
			<div v-else>
				<input-jadwal-pertemuan :errors="errors" :index="i-1"/>
			</div>
		</div>
	</div>
</template>
<script>
import InputJadwalPertemuan from './InputPaket.vue'
export default {
  	components: { InputJadwalPertemuan },
	props: {
        errors: Object,
		id: Number,
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
    },
}
</script>

<style>

</style>