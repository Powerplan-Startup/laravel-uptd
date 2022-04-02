<template>
    <div>
        <router-view/>
        <template>
            <jadwal-tambah/>
            <jadwal-ubah/>
            <jadwal-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import JadwalHapus from './JadwalHapus.vue'
import JadwalTambah from './JadwalTambah.vue'
import JadwalUbah from './JadwalUbah.vue'
export default {
    components: { 
        JadwalTambah, 
        JadwalUbah, 
        JadwalHapus 
    },
    computed: {
        ...mapGetters({
            // isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>