
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import {ServerTable, ClientTable, Event} from 'vue-tables-2';
Vue.use(ClientTable);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Customers from "./components/Customers.vue";

const app = new Vue({
    components : {
        Customers
    },
    el: '#app'
});
