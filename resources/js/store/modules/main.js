export default {
    namespaced: true,
    state: {
        isInteractionEnabled: false
    },
    getters: {
        IS_INTERACTION_ENABLED: state => state.isInteractionEnabled
    },
    mutations: {
        SWITCH_INTERACTION: (state, boolean) => Vue.set(state, 'isInteractionEnabled', boolean)
    },
    actions: {
        SWITCH_INTERACTION: ({commit}, payload) => commit('SWITCH_INTERACTION', Boolean(payload))
    }
};