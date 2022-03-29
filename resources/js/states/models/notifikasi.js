
export default {
    namespaced: true,

    state: {
        message     : "",
        color       : null,
        timeout     : "",
        top         : null,
        right       : null,
        bottom      : null,
        left        : null,
    },

    mutations: {
        SHOW_MESSAGE(state, payload = { color : null, timeout : 10000, top: null, right: null, bottom: null, left: null }) {
            state.message = payload.message
            state.color = payload.color
            state.timeout = payload.timeout
            state.top = payload.top
            state.right = payload.right
            state.bottom = payload.bottom
            state.left = payload.left
        },
    },
    actions: {
        showSnack({ commit }, payload) {
            commit("SHOW_MESSAGE", payload);
        },
        notif({ commit }, payload) {
            commit("SHOW_MESSAGE", payload);
        },
        showNotification({ commit }, payload) {
            commit("SHOW_MESSAGE", payload);
        },
        show({ commit }, payload) {
            commit("SHOW_MESSAGE", payload);
        },
    },
}