import Vue from 'vue';
import 'vuetify/dist/vuetify.min.css'
import router from './plugins/router';
import store from './plugins/store'

require('./private-bootstrap');
const vuetify = require('./plugins/vuetify').default;
require('./plugins/helper')

import DashboardAdmin from './components/DashboardAdmin.vue'

const app = new Vue({
	vuetify,
	router,
	store,
	components: {
		DashboardAdmin
	},
	el: '#app',
});
