import InstrukturBase from '../../pages/admin/instruktur/InstrukturBase.vue'
import InstrukturIndex from '../../pages/admin/instruktur/InstrukturIndex.vue'
import InstrukturInfo from '../../pages/admin/instruktur/InstrukturInfo.vue'
import InstrukturInfoIndex from '../../pages/admin/instruktur/tab/InstrukturInfoIndex.vue'
import InstrukturTambah from '../../pages/admin/instruktur/page/InstrukturTambahIndex.vue'
import InstrukturList from '../../pages/admin/instruktur/page/InstrukturListIndex.vue'

export const instruktur = [
    { path: '/admin/instruktur', component: InstrukturBase, children: [
        { path: 'list', component: InstrukturIndex, children: [
            { path: '/', component: InstrukturList, name: 'instruktur.list' },
        ]},
        { path: 'tambah', component: InstrukturIndex, children: [
            { path: '/', component: InstrukturTambah, name: 'instruktur.insert' },
        ]},
        { path: ':id_instruktur', component: InstrukturInfo, children: [
            { path: '/', component: InstrukturInfoIndex, name: 'instruktur.show' },
        ] },
        { path: '/', component: InstrukturIndex, children: [
            { path: '/', component: InstrukturList, name: 'instruktur' },
        ] },
    ] },
]
export default instruktur