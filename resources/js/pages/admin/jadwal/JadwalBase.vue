<template>
    <div>
        <router-view/>
        <template>
            <kejuruan-tambah/>
            <kejuruan-ubah/>
            <kejuruan-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import KejuruanHapus from './KejuruanHapus.vue'
import KejuruanTambah from './KejuruanTambah.vue'
import KejuruanUbah from './KejuruanUbah.vue'
export default {
    components: { 
        KejuruanTambah, 
        KejuruanUbah, 
        KejuruanHapus 
    },
    computed: {
        ...mapGetters({
            // isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>