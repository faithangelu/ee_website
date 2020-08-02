/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform'
import VueRouter from 'vue-router'
import swal from 'sweetalert2'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.use(VueRouter)

window.Swal = swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

window.Toast = Toast;


const router = new VueRouter({
    mode : 'history',
    routes : [
        { 
            path: '/admin/home', 
            name: 'Dashboard',
            component: require('./components/Dashboard.vue').default 
        },
        { 
            path: '/admin/marketplaces', 
            name: 'Market Place',
            component: require('./components/Marketplace.vue').default 
        },
        { 
            path: '/admin/audit-trail', 
            name: 'Audit Trail',
            component: require('./components/Marketplace.vue').default 
        },
        { 
            path: '/admin/registered_users', 
            name: 'Audit Trail',
            component: require('./components/Registered_users.vue').default 
        },
        { 
            path: '/admin/users', 
            name: 'Users',
            component: require('./components/Users.vue').default 
        }
    ]
}) 

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});



