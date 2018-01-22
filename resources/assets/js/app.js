import Vue from 'vue';
import VueRouter from 'vue-router';
import Chartkick from 'chartkick'
import VueChartkick from 'vue-chartkick'
import Chart from 'chart.js'
import VueAxios from 'vue-axios';
import axios from 'axios';


import App from './App.vue';
import SensorReadings from './components/SensorReadings.vue';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueChartkick, { Chartkick })

const routes = [
  {
      name: 'SensorReadings',
      path: '/',
      component: SensorReadings
  }
];
const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');

