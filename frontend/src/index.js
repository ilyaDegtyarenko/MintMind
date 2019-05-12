import 'es6-promise/auto'
import 'babel-polyfill'
import './plugins/vuetify'
import './styles/app.scss'
import './prototypes'
import Vue from 'vue'
import App from './components/App.vue'
import router from './routes/main'
import store from './store/main'
import i18n from './plugins/i18n'

// import {VueReCaptcha} from 'vue-recaptcha-v3';
// Vue.use(VueReCaptcha, {siteKey: googleReCaptchaSiteKey});

// window.axios = require('axios');
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// let token = document.head.querySelector('meta[name="csrf-token"]');
// if (token) {
//   window.axios.defaults.headers.common['x-csrf-token'] = token.content;
// } else {
//   console.error('CSRF token not found.');
// }

Vue.config.productionTip = false

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#app')
