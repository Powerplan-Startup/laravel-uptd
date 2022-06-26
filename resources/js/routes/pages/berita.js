import BeritaBase from '../../pages/admin/berita/BeritaBase.vue'
import BeritaIndex from '../../pages/admin/berita/BeritaIndex.vue'
import BeritaInfo from '../../pages/admin/berita/BeritaInfo.vue'
import BeritaInfoIndex from '../../pages/admin/berita/tab/BeritaInfoIndex.vue'
import BeritaTambah from '../../pages/admin/berita/page/BeritaTambahIndex.vue'
import BeritaList from '../../pages/admin/berita/page/BeritaListIndex.vue'

export const berita = [
    { path: '/admin/berita', component: BeritaBase, children: [
        { path: 'list', component: BeritaIndex, children: [
            { path: '/', component: BeritaList, name: 'berita.list' },
        ]},
        { path: 'tambah', component: BeritaIndex, children: [
            { path: '/', component: BeritaTambah, name: 'berita.insert' },
        ]},
        { path: ':id_berita', component: BeritaInfo, children: [
            { path: '/', component: BeritaInfoIndex, name: 'berita.show' },
        ] },
        { path: '/', component: BeritaIndex, children: [
            { path: '/', component: BeritaList, name: 'berita' },
        ] },
    ] },
]
export default berita