require('./bootstrap');

import 'es6-promise/auto';
import store from './store/index';
import router from './routes/index';
import {VueOnline} from 'vue-online';

Vue.prototype.$bus = new Vue();
Vue.prototype.$internetConnection = VueOnline;
Vue.prototype.$translate = window.translate;

Vue.component('app', require('./components/App').default);

/* App. */
new Vue({
    store,
    router
}).$mount('#app');