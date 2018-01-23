require('./bootstrap.js')

window.Vue = require('vue');

import VueRouter from 'vue-router';
import Chartkick from 'chartkick'
import VueChartkick from 'vue-chartkick'
import Chart from 'chart.js'
import VueAxios from 'vue-axios';
import axios from 'axios';


// import App from './App.vue';

// Vue.component('MonthlyReadings', require('./components/MonthlyReadings.vue'));
// Vue.component('YearlyReadings', require('./components/YearlyReadings.vue'));
import MonthlyReadings from './components/MonthlyReadings'; 
import YearlyReadings from './components/YearlyReadings'; 


// Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueChartkick, { Chartkick })

// const routes = [
//   {
//       name: 'MonthlyReadings',
//       path: '/',
//       component: MonthlyReadings
//   },
//   // {
//   //     name: 'YearlyReadings',
//   //     path: '/',
//   //     component: YearlyReadings
//   // }
// ];

window.app = new Vue({
  el: '#app',
  template: '<MonthlyReadings/>',
  data: {
    currentView: 'MonthlyReadings'
  },
  components: { MonthlyReadings }
  // components: { 
  //   MonthlyReadings: { MonthlyReadings }, 
  //   // YearlyReadings: { YearlyReadings }
  // }
});




// const router = new VueRouter({ mode: 'history', routes: routes});
// new Vue(Vue.util.extend({ router }, App)).$mount('#app');

