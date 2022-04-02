<template>
    <div>
        <router-view/>
        <template>
            <peserta-tambah/>
            <peserta-ubah/>
            <peserta-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import PesertaHapus from './PesertaHapus.vue'
import PesertaTambah from './PesertaTambah.vue'
import PesertaUbah from './PesertaUbah.vue'
export default {
    components: { 
        PesertaTambah, 
        PesertaUbah, 
        PesertaHapus 
    },
    computed: {
        ...mapGetters({
            // isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>