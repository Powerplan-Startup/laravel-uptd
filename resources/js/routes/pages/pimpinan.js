import PimpinanBase from '../../pages/admin/pimpinan/PimpinanBase.vue'
import PimpinanIndex from '../../pages/admin/pimpinan/PimpinanIndex.vue'
import PimpinanInfo from '../../pages/admin/pimpinan/PimpinanInfo.vue'
import PimpinanInfoIndex from '../../pages/admin/pimpinan/tab/PimpinanInfoIndex.vue'
import PimpinanTambah from '../../pages/admin/pimpinan/page/PimpinanTambahIndex.vue'
import PimpinanList from '../../pages/admin/pimpinan/page/PimpinanListIndex.vue'

export const pimpinan = [
    { path: '/admin/pimpinan', component: PimpinanBase, children: [
        { path: 'list', component: PimpinanIndex, children: [
            { path: '/', component: PimpinanList, name: 'pimpinan.list' },
        ]},
        { path: 'tambah', component: PimpinanIndex, children: [
            { path: '/', component: PimpinanTambah, name: 'pimpinan.insert' },
        ]},
        { path: ':id', component: PimpinanInfo, children: [
            { path: '/', component: PimpinanInfoIndex, name: 'pimpinan.show' },
        ] },
        { path: '/', component: PimpinanIndex, children: [
            { path: '/', component: PimpinanList, name: 'pimpinan' },
        ] },
    ] },
]
export default pimpinan