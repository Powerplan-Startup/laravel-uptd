import Vue from 'vue';
import 'vuetify/dist/vuetify.min.css'

require('./private-bootstrap');
const vuetify = require('./plugins/vuetify').default;

import DashboardAdmin from './components/DashboardAdmin.vue'

const app = new Vue({
	vuetify,
	components: {
		DashboardAdmin
	},
	el: '#app',
});
