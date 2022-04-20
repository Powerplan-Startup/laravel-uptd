import Vue from 'vue'
import Vuex from 'vuex'
import Router from 'vue-router'
import VueRouter from 'vue-router'
import routes from '../routes/web'
import store from './store'
import axios from 'axios'

Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

router.beforeEach(async (to, from, next) => {
    /**
     * konfigurasi
     * konfigurasi axios
     * 
     */
    axios.interceptors.response.use(function (response) {
        if(response.config.category == 'DELETE' && response.status == 204){
            store.dispatch('notifikasi/show', {
                message: "Berhasil menghapus data 👌"
            })
        }
        if(response.status == 201){
            store.dispatch('notifikasi/show', {
                message: "Berhasil menyimpan data 👌"
            })
        }
        return response;
    }, function (error) {
        if(error.response.status == 401){
            localStorage.removeItem('authToken')
            if(to.path == '/admin/401'){
                return null
            }
            next({ path: '/admin/401' })
            return null
        } else if(error.response.status == 403){
            store.dispatch('notifikasi/show', {
                message: error.message
            })
        }
        return Promise.reject(error);
    });

    // store.commit('SETLOADINGAPP', true)
	// return next();

    if(to.path == '/admin/401') return next()
    await store.dispatch('auth/getToken')
    let token = await store.getters['auth/token'];

    let Authorization = "";

    if(token)
        Authorization = `Bearer ${token}`
    
    axios.defaults.headers.common = {
        Authorization: Authorization,
        "Accept": "application/json",
    };

	store.dispatch('auth/loadUser').then(e => {
        store.commit('auth/setUser', e.data)
    })

    if(store.getters['auth/hasToken']) return next()

    // let token = localStorage.getItem('authToken')
    // let res = await store.dispatch('_login/admin/check', {
    //     token
    // })
    // if(res.status == 200 && res?.data?.data){
    //     store.commit('_login/admin/SET_USER', res.data.data)
    //     if(store.getters['_login/admin/exists']) return next()
    // }
    // next({
    //     path: '/admin/403'
    // })
})

router.afterEach(async (to, from, next) => {
    // setTimeout(()=>{
    //     store.commit('SETLOADINGAPP', false)
    // }, 500)
})

export default router