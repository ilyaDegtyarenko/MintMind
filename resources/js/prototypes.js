import {VueOnline} from 'vue-online';

Vue.prototype.$bus = new Vue();
Vue.prototype.$internetConnection = VueOnline;
Vue.prototype.$translate = translate;
Vue.prototype.$locale = locale;