import axios from 'axios'

import { api } from '../../configs/store'

export default {
    namespaced: true,
    
    state: {
        items: [],
        user: {},
        selected: {
            id:     null,
            ids:    [],
            item:   null,
            items:  []
        },
        modal: {
            tambah: false,
            ubah: false,
            hapus: false,
            info: false,
        },
        errors: {},
        session: {
            code: 0
        }
    },
    getters: {
        getTotal(state){
            return state.items.length
        },
        getSession(state){
            return state.session.code
        },
    },
    actions: {
        get(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.get(api('instruktur'), { params: params }).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        count(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.get(api('analytic/instruktur/count'), { params: params }).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        async show(context, {data = {}, id}){
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.get(api(`instruktur/${id}`), { params: data }).catch(e => reject(e))
                    if(res) resolve(res)
                })
            else
                console.warn("show@instruktur.js", "id kosong 🤦‍♂️");
        },
        store(context, data){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.post(api('instruktur'), data).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        async update(context, { data, id }){
            if(id){
                if(data instanceof FormData)
                    data.append('_method', 'PUT')
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.post(api(`instruktur/${id}`), data).catch(e => reject(e))
                    if(res) resolve(res)
                })
            }
            else
                console.warn("update@instruktur.js", "id kosong 🤦‍♂️");
        },
        async destroy(context, { data, id }){
            if(id){
                if(data instanceof FormData)
                    data.append('_method', 'DELETE')
                return new Promise(async(resolve, reject)=>{
                    let res = await axios({
                        method: 'post',
                        url: api(`instruktur/${id}`),
                        data,
                        category: 'DELETE',
                    }).catch(e => reject(e))
                    if(res) resolve(res)
                })
            }
            else
                console.warn("destroy@instruktur.js", "id kosong 🤦‍♂️");
        },
        updateSession(context, data){
            context.commit('SET_SESSION_CODE', data || (new Date).getTime())
        },

        /**
         * modal
         * 
         */
        setModalUbah(context, payload){
            if(typeof payload != "object")
                throw Error("setModalUbah butuh parameter object { [id: string], value: bool }")
            let mvalue = payload.value
            if(mvalue){
                if(payload.id == null)
                    throw Error("setModalHapus butuh key id jika valuenya true")
                context.commit('PUSH_ID', payload.id)
                context.commit('SET_MODAL_UBAH', true)
            } else {
                context.commit('POP_ID', payload.id)
                context.commit('SET_MODAL_UBAH', false)
            }
        },
        setModalHapus(context, payload){
            if(typeof payload != "object")
                throw Error("setModalHapus butuh parameter object { [id: string], value: bool }")
            let mvalue = payload.value
            if(mvalue){
                if(payload.id == null)
                    throw Error("setModalHapus butuh key id jika valuenya true")
                context.commit('PUSH_ID', payload.id)
                context.commit('SET_MODAL_HAPUS', true)
            } else {
                context.commit('POP_ID', payload.id)
                context.commit('SET_MODAL_HAPUS', false)
            }
        },
    },
    mutations: {
        SET_MODAL_TAMBAH(state, payload){
            state.modal.tambah = payload
        },
        SET_MODAL_UBAH(state, payload){
            state.modal.ubah = payload
        },
        SET_MODAL_HAPUS(state, payload){
            state.modal.hapus = payload
        },
        SET_MODAL_INFO(state, payload){
            state.modal.info = payload
        },
        SET_ERRORS(state, payload){
            state.errors = payload
        },
        CLEAR_ERROR(state, payload){
            state.errors[payload] = null
        },
        CLEAR_ERRORS(state, payload){
            state.errors = {}
        },
        SET_ID(state, payload){
            state.selected.id = payload
        },
        PUSH_ID(state, payload){
            state.selected.id = payload
            state.selected.ids.push(payload)
        },
        POP_ID(state, payload){

            /**
             * push:    1
             * id:      1
             * push:    1, 2
             * id:      2
             * push:    1, 2, 3
             * id:      3
             * pop:     1, 2
             * id:      2
             *      
             */

            state.selected.ids.pop()
            if(state.selected.ids.length)
                state.selected.id = state.selected.ids[state.selected.ids.length-1]
            else state.selected.id = null
        },
        SET_ITEMS(state, payload){
            state.items = payload
        },
        SET_SESSION_CODE(state, payload){
            state.session.code = payload
        }
    },
    modules: {
    }
}