/**
 * Bootstrap necessary packages and configure settings.
 */

/* Lodash. */
window._ = require('lodash');

/* Axios. */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/* Register the CSRF Token as a common header with Axios. */
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['x-csrf-token'] = token.content;
} else {
    console.error('CSRF token not found.');
}