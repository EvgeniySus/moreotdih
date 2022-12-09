//require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue');

Vue.component('logo', require('./components/logo').default);

const app = new Vue({
    el: '#app'
});
