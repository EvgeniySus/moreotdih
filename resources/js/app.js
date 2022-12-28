//require('./bootstrap');
import Vue from 'vue';
import ElementUI from 'element-ui';
// Компоненты: el-date-picker
import lang from 'element-ui/lib/locale/lang/ru-RU'
import locale from 'element-ui/lib/locale'
import 'element-ui/lib/theme-chalk/index.css';
window.Vue = require('vue');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


Vue.component('logo', require('./components/logo').default);
Vue.component('topmenu', require('./components/topmenu/topmenu').default);
Vue.component('topcontact', require('./components/topcontact').default);
Vue.component('search_form_top', require('./components/search_form/search_form_top').default);
Vue.component('error_alert', require('./components/error_alert').default);
Vue.component('slaider_hotel', require('./components/slider_hotel/slaider_hotel').default);
Vue.component('slaider_hotel', require('./components/slider_hotel/slaider_hotel').default);
Vue.component('item_slider_card', require('./components/library/hotel/item_slider_card').default);
Vue.component('hotelprice', require('./components/library/hotel/hotelprice').default);


Vue.use(ElementUI);
locale.use(lang);


const app = new Vue({
    el: '#app',

   // render: h => h(App)
});
