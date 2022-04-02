import JadwalBase from '../../pages/admin/jadwal/JadwalBase.vue'
import JadwalIndex from '../../pages/admin/jadwal/JadwalIndex.vue'
import JadwalInfo from '../../pages/admin/jadwal/JadwalInfo.vue'
import JadwalInfoIndex from '../../pages/admin/jadwal/tab/JadwalInfoIndex.vue'
import JadwalTambah from '../../pages/admin/jadwal/page/JadwalTambahIndex.vue'
import JadwalList from '../../pages/admin/jadwal/page/JadwalListIndex.vue'

export const jadwal = [
    { path: '/admin/jadwal', component: JadwalBase, children: [
        { path: 'list', component: JadwalIndex, children: [
            { path: '/', component: JadwalList, name: 'jadwal.list' },
        ]},
        { path: 'tambah', component: JadwalIndex, children: [
            { path: '/', component: JadwalTambah, name: 'jadwal.insert' },
        ]},
        { path: ':id_jadwal', component: JadwalInfo, children: [
            { path: '/', component: JadwalInfoIndex, name: 'jadwal.show' },
        ] },
        { path: '/', component: JadwalIndex, children: [
            { path: '/', component: JadwalList, name: 'jadwal' },
        ] },
    ] },
]
export default jadwal