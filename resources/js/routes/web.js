
import IndexDashboard from '../pages/admin/IndexDashboard.vue'
import instruktur from './pages/instruktur'

import kejuruan from './pages/kejuruan'

export default [
    { path: '/admin', component: IndexDashboard, name: 'admin' },
	...kejuruan,
    ...instruktur,

    // { path: '/admin/403', component: Error403, name: 'error.404' },
    // { path: '/admin/401', component: Error401, },
    { path: '*', component: IndexDashboard, },
]