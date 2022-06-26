<template>
    <div>
        <router-view/>
        <berita-tambah/>
        <berita-ubah/>
        <berita-hapus/>
    </div>
</template>
<script>
import BeritaHapus from './BeritaHapus.vue'
import BeritaTambah from './BeritaTambah.vue'
import BeritaUbah from './BeritaUbah.vue'
export default {
    components: {
        BeritaTambah,
        BeritaUbah,
        BeritaHapus 
    },
}
</script>