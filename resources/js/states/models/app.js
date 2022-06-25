export default {

	namespaced: true,
	state: {
		sidebar: null,
	},
	mutations: {
		setSidebar(state, sidebar){
			state.sidebar = sidebar
		},
	},
	getters: {
		getSidebar(state){
			return state.sidebar
		},
	},
	actions: {
	}

}