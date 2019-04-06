window._ = require('lodash');
window.Vue = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/* Register the CSRF Token as common header with Axios. */
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['x-csrf-token'] = token.content;
} else {
    console.error('CSRF token not found.');
}

/* Promise for old browsers. */
import 'es6-promise/auto';

/* Google recaptcha. */
import {VueReCaptcha} from 'vue-recaptcha-v3';

Vue.use(VueReCaptcha, {siteKey: googleReCaptchaSiteKey});

/* Ripple effect, */
import Ripple from '@js/ripple';

Ripple.activeMouseButtons = [1];
Ripple.zIndex = -1;
Vue.directive('ripple-effect', Ripple);