//require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue');

Vue.component('logo', require('./components/logo').default);
Vue.component('topmenu', require('./components/topmenu/topmenu').default);
Vue.component('topcontact', require('./components/topcontact').default);
const app = new Vue({
    el: '#app'
});
