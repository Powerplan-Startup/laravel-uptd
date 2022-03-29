import KejuruanBase from '../../pages/admin/kejuruan/KejuruanBase.vue'
import KejuruanIndex from '../../pages/admin/kejuruan/KejuruanIndex.vue'
import KejuruanInfo from '../../pages/admin/kejuruan/KejuruanInfo.vue'
// import KejuruanInfoIndex from '../../pages/admin/kejuruan/tab/KejuruanInfoIndex.vue'
// import KejuruanKelasIndex from '../../pages/admin/kejuruan/tab/KejuruanKelasIndex.vue'
import KejuruanTambah from '../../pages/admin/kejuruan/page/KejuruanTambahIndex.vue'
import KejuruanList from '../../pages/admin/kejuruan/page/KejuruanListIndex.vue'

export const kejuruan = [
    { path: '/admin/kejuruan', component: KejuruanBase, children: [
        { path: 'list', component: KejuruanIndex, children: [
            { path: '/', component: KejuruanList, name: 'kejuruan.list' },
        ]},
        { path: 'tambah', component: KejuruanIndex, children: [
            { path: '/', component: KejuruanTambah, name: 'kejuruan.insert' },
        ]},
        { path: ':id_kejuruan', component: KejuruanInfo, children: [
            // { path: 'kelas', component: KejuruanKelasIndex, name: 'kejuruan.kelas' },
            // { path: '/', component: KejuruanInfoIndex, name: 'kejuruan.show' },
        ] },
        { path: '/', component: KejuruanIndex, children: [
            { path: '/', component: KejuruanList, name: 'kejuruan' },
        ] },
    ] },
]
export default kejuruan