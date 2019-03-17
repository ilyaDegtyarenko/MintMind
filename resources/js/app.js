require('./bootstrap');

import 'es6-promise/auto';
import store from './store/index';
import router from './routes/index';
import {VueOnline} from 'vue-online';
import {VueReCaptcha} from 'vue-recaptcha-v3';
import Ripple from 'vue-ripple-directive';

Ripple.color = 'rgba(69, 231, 164, .5)';
Vue.directive('ripple-effect', Ripple);
Vue.use(VueReCaptcha, {siteKey: googleReCaptchaSiteKey});

Vue.prototype.$bus = new Vue();
Vue.prototype.$internetConnection = VueOnline;
Vue.prototype.$translate = translate;
Vue.prototype.$locale = locale;

Vue.component('app', require('./components/App').default);

/* App. */
new Vue({
    store,
    router
}).$mount('#app');