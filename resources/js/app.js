/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-application', require('./components/ChatApplication.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        userID: null
    },
    mounted() {
        this.userID = document.head.querySelector('meta[name="userID"]').content
    }
});


import Echo from 'laravel-echo'

window._ = require('lodash')
window.Popper = require('popper.js').default
window.io = require('socket.io-client')


try {
    window.$ = window.jQuery = require('jquery')
  
    require('bootstrap')
  } catch (e) {
  }
  window.axios = require('axios')

  window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
  let token = document.head.querySelector('meta[name="csrf-token"]')

  if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
  } else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
  }
      