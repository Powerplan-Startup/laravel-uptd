import PesertaBase from '../../pages/admin/peserta/PesertaBase.vue'
import PesertaIndex from '../../pages/admin/peserta/PesertaIndex.vue'
import PesertaInfo from '../../pages/admin/peserta/PesertaInfo.vue'
import PesertaInfoIndex from '../../pages/admin/peserta/tab/PesertaInfoIndex.vue'
import PesertaTambah from '../../pages/admin/peserta/page/PesertaTambahIndex.vue'
import PesertaList from '../../pages/admin/peserta/page/PesertaListIndex.vue'

export const peserta = [
    { path: '/admin/peserta', component: PesertaBase, children: [
        { path: 'list', component: PesertaIndex, children: [
            { path: '/', component: PesertaList, name: 'peserta.list' },
        ]},
        { path: 'tambah', component: PesertaIndex, children: [
            { path: '/', component: PesertaTambah, name: 'peserta.insert' },
        ]},
        { path: ':id_kejuruan', component: PesertaInfo, children: [
            { path: '/', component: PesertaInfoIndex, name: 'peserta.show' },
        ] },
        { path: '/', component: PesertaIndex, children: [
            { path: '/', component: PesertaList, name: 'peserta' },
        ] },
    ] },
]
export default peserta