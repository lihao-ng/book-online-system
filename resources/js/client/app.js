require('../bootstrap');

window.Vue = require('vue');
window.VuePaginate = require('vue-paginate');

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

require('./scripts/_cartPage.js');

const app = new Vue({
    el: '#client-app'
});

// require('./vendors/noUiSlider.js');
// require('./scripts/filter-slider');
// var filterSlider = document.getElementById('filter-slider');
// noUiSlider.create(filterSlider, {
//     start: [80],
//     range: {
//         'min': 0,
//         'max': 100
//     }
// });