/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');





import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);


import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import {routes} from './routes';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('admin', require('./components/backend/Admin.vue').default);

Vue.component('front', require('./components/frontend/Front.vue').default);

import { Form, HasError, AlertError } from 'vform'




Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;


import Vue from "vue";
import VueSimpleAlert from "vue-simple-alert";
 
Vue.use(VueSimpleAlert);






const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'hash',

})


const app = new Vue({
    el: '#app',
    router,
    store,
});
