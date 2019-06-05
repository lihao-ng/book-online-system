require('../bootstrap');

window.Vue = require('vue');
window.bootstrapTable = require('bootstrap-table');
window.swal = require('sweetalert2');
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

require('./scripts/bootstrap-table-setup');

const app = new Vue({
    el: '#admin-app'
});