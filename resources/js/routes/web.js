
import IndexDashboard from '../pages/admin/IndexDashboard.vue'
import peserta from './pages/peserta'
import instruktur from './pages/instruktur'
import jadwal from './pages/jadwal'

import kejuruan from './pages/kejuruan'
import laporan from './pages/laporan'
import berita from './pages/berita'
import pimpinan from './pages/pimpinan'
import paket from './pages/paket'

export default [
    { path: '/admin', component: IndexDashboard, name: 'admin' },
	...kejuruan,
    ...instruktur,
    ...jadwal,
    ...peserta,
    ...laporan,
    ...berita,
    ...pimpinan,
    ...paket,

    // { path: '/admin/403', component: Error403, name: 'error.404' },
    // { path: '/admin/401', component: Error401, },
    { path: '*', component: IndexDashboard, },
]