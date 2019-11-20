
import Vue from 'vue';
import Vuex from 'vuex'
import BootstrapVue from 'bootstrap-vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import VeeValidate from 'vee-validate';
import VueAxios from 'vue-axios'
import axios from 'axios';
import VueMask from 'v-mask'
import VueHtmlToPaper from 'vue-html-to-paper';

import 'vuetify/dist/vuetify.min.css';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import routers from './route';
import storage from './store';

require('./bootstrap');
const options = {
    name: '_blank',
    specs: [
      'fullscreen=yes',
      'titlebar=yes',
      'scrollbars=yes'
    ],
    styles: [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        '/css/jofform.css',
      ]
  }

Vue.use(Vuetify);
Vue.use(BootstrapVue)
Vue.use(VueAxios, axios)
Vue.use(VueRouter);
// Vue.use(Vuex);
Vue.use(VeeValidate);
Vue.use(VueMask);
Vue.use(VueHtmlToPaper, options);

window.Vue = require('vue');



Vue.component('sidepanel-component', require('./components/AdminDashboard/SidePanelComponent.vue').default);
Vue.component('trackingstatus-component', require('./components/UserSide/TrackingStatusComponent.vue').default);
Vue.component('superadmin-component', require('./components/AdminDashboard/SuperAdminComponent.vue').default);

Vue.component('home-component', require('./components/Landing/HomeComponent.vue').default);


const vuetifyOptions = {}  

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(vuetifyOptions),
    router: new VueRouter(routers),
    // store: new Vuex.Store(storage)
});

