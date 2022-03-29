import Vue from 'vue'
import Vuex from 'vuex'
import states from '../states/states'
/**
 * konfigurasi vuex state
 * 
 */
Vue.use(Vuex)
export const store = new Vuex.Store( { modules: states } )

export default store