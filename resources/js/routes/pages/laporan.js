import LaporanBase from '../../pages/admin/laporan/LaporanBase.vue'
import LaporanIndex from '../../pages/admin/laporan/LaporanIndex.vue'
// import LaporanInfo from '../../pages/admin/laporan/LaporanInfo.vue'
// import LaporanInfoIndex from '../../pages/admin/laporan/tab/LaporanInfoIndex.vue'
import LaporanList from '../../pages/admin/laporan/page/LaporanListIndex.vue'

export const laporan = [
    { path: '/admin/laporan', component: LaporanBase, children: [
        // { path: 'list', component: LaporanIndex, children: [
        //     { path: '/', component: LaporanList, name: 'laporan.list' },
        // ]},
        // { path: ':id_laporan', component: LaporanInfo, children: [
        //     { path: '/', component: LaporanInfoIndex, name: 'laporan.show' },
        // ] },
        { path: '/', component: LaporanIndex, name: 'laporan', children: [
            // { path: '/', component: LaporanList, name: 'laporan' },
        ] },
    ] },
]
export default laporan