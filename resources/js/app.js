
require('./bootstrap');

window.Vue = require('vue');

import router from './router'

import Vue from 'vue'
import vuetify from './plugins/vuetify' // path to vuetify export


import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import locale from 'view-design/dist/locale/fr-FR';
Vue.use(ViewUI, { locale });


Vue.component('App', require('./App.vue').default);
Vue.component('foot', require('./components/foot.vue').default);

//mixin
import common from './common'
Vue.mixin(common)


const app = new Vue({
    vuetify,
    el: '#app',
    router
});
