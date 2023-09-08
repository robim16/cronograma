window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('./bootstrap');

window.Vue = require('vue').default;
 
const app = new Vue({
    el: '#app',
});

if (document.getElementById('notificaciones')) {
    require('./admin/notifications');
}