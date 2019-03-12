import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import LOCAL_STORAGE from './modules/local-storage';
import MAIN from './modules/main';

const store = new Vuex.Store({
    modules: {
        MAIN,
        LOCAL_STORAGE
    }
});

export default store;