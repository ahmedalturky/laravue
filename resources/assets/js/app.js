/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment'
import Form from 'vform'

import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', swal.stopTimer)
        toast.addEventListener('mouseleave', swal.resumeTimer)
    }
});
window.toast = toast;


window.Form = Form;
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})
import DataTable from 'laravel-vue-datatable';
Vue.use(DataTable);


let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue') },
    { path: '/developer', component: require('./components/Developer.vue') },
    { path: '/users', component: require('./components/users.vue') },
    { path: '/expenses', component: require('./components/expenses.vue') },
    { path: '/order', component: require('./components/form_order.vue') },
    { path: '/orders', component: require('./components/orders.vue') },
    { path: '/beautifying', component: require('./components/form_beautifying_order.vue') },
    { path: '/treasury', component: require('./components/treasury.vue') },
    { path: '/prodects', component: require('./components/prodects.vue') },
    { path: '/useres', component: require('./components/users_b.vue') }





]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

Vue.filter('uptext', function(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('mydate', function(craeted) {
    return moment(craeted).format("MMM Do YY");
});


window.Fire = new Vue();
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});