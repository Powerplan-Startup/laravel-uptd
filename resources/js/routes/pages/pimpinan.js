import PimpinanBase from '../../pages/admin/pimpinan/PimpinanBase.vue'
import PimpinanIndex from '../../pages/admin/pimpinan/PimpinanIndex.vue'
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
        { path: '/', component: PimpinanIndex, children: [
            { path: '/', component: PimpinanList, name: 'pimpinan' },
        ] },
    ] },
]
export default pimpinan