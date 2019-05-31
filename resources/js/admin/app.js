require('../bootstrap');


window.bootstrapTable = require('bootstrap-table');
window.swal = require('sweetalert2');
window.moment = require('moment');
window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

require('./vendors/bootstrap-datetimepicker');
require('./scripts/bootstrap-table-setup');
require('./scripts/bootstrap-datetimepicker-setup');

const app = new Vue({   
    el: '#admin-app'
});