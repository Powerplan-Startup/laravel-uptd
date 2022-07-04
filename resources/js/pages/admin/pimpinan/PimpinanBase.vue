<template>
    <div>
        <router-view/>
        <pimpinan-tambah/>
        <pimpinan-ubah/>
        <pimpinan-hapus/>
    </div>
</template>
<script>
import PimpinanHapus from './PimpinanHapus.vue'
import PimpinanTambah from './PimpinanTambah.vue'
import PimpinanUbah from './PimpinanUbah.vue'
export default {
    components: {
        PimpinanTambah,
        PimpinanUbah,
        PimpinanHapus 
    },
}
</script>