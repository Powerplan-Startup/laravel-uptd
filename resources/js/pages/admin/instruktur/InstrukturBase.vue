<template>
    <div>
        <router-view/>
        <template>
            <instruktur-tambah/>
            <instruktur-ubah/>
            <instruktur-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import InstrukturHapus from './InstrukturHapus.vue'
import InstrukturTambah from './InstrukturTambah.vue'
import InstrukturUbah from './InstrukturUbah.vue'
export default {
    components: { 
        InstrukturTambah, 
        InstrukturUbah, 
        InstrukturHapus 
    },
    computed: {
        ...mapGetters({
            // isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>