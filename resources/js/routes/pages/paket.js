import PaketBase from '../../pages/admin/paket/PaketBase.vue'
import PaketIndex from '../../pages/admin/paket/PaketIndex.vue'
import PaketInfo from '../../pages/admin/paket/PaketInfo.vue'
import PaketInfoIndex from '../../pages/admin/paket/tab/PaketInfoIndex.vue'
import PaketTambah from '../../pages/admin/paket/page/PaketTambahIndex.vue'
import PaketList from '../../pages/admin/paket/page/PaketListIndex.vue'

export const paket = [
    { path: '/admin/paket', component: PaketBase, children: [
        { path: 'list', component: PaketIndex, children: [
            { path: '/', component: PaketList, name: 'paket.list' },
        ]},
        { path: 'tambah', component: PaketIndex, children: [
            { path: '/', component: PaketTambah, name: 'paket.insert' },
        ]},
        { path: ':id_paket', component: PaketInfo, children: [
            { path: '/', component: PaketInfoIndex, name: 'paket.show' },
        ] },
        { path: '/', component: PaketIndex, children: [
            { path: '/', component: PaketList, name: 'paket' },
        ] },
    ] },
]
export default paket