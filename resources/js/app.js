/**
 * Main js file.
 */

window.Vue = require('vue');

/* Parts. */
require('./bootstrap');
require('./global-components');

/* Bus. */
Vue.prototype.$bus = new Vue();

/* App. */
new Vue().$mount('#app');