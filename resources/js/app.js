require('./bootstrap');
require('./prototypes'); /* Global prototypes. */
require('./directives'); /* Global directives. */

Vue.component('app', require('./components/App').default);

/* Vuex - store. */
import store from './store/index';

/* VueRouter - routes. */
import router from './routes/index';

/* App. */
new Vue({
    store,
    router
}).$mount('#app');