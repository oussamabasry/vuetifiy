
require('./bootstrap');

window.Vue = require('vue');

import router from './router'

import Vue from 'vue'
import vuetify from './plugins/vuetify' // path to vuetify export


Vue.component('App', require('./App.vue').default);
Vue.component('foot', require('./components/foot.vue').default);


const app = new Vue({
    vuetify,
    el: '#app',
    router
});
