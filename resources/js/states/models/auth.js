import Axios from "axios"

export default {

	namespaced: true,
	state: {
		user: {},
		token: null,
	},
	mutations: {
		setUser(state, user){
			state.user = user
		},
		setToken(state, token){
			state.token = token
		}
	},
	getters: {
		getUser(state){
			return state.user
		},
		hasToken(state){
			return state.token != null
		},
		token(state){
			return state.token
		}
	},
	actions: {
		async getToken({commit}){
			if(window.localStorage.getItem('token')){
				commit('setToken', window.localStorage.getItem('token'))
			} else {
				let res = await Axios.get('/auth/token', {
					headers: {},
					params: {
						token_name: 'uptd'
					}
				}).catch(err => {
					console.log(err)
				})
				let token = res.data.token.replace(/^([0-9]+\|)(.*)$/, '$2')
				commit('setToken', token)
				window.localStorage.setItem('token', token)
			}
		}
	}

}