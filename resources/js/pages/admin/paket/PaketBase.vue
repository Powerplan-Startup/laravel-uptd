<template>
    <div>
        <router-view/>
        <template>
            <paket-tambah/>
            <paket-ubah/>
            <paket-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import PaketHapus from './PaketHapus.vue'
import PaketTambah from './PaketTambah.vue'
import PaketUbah from './PaketUbah.vue'
export default {
    components: { 
        PaketTambah, 
        PaketUbah, 
        PaketHapus 
    },
    computed: {
        ...mapGetters({
            // isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>