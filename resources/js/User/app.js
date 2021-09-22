/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

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
import VueRouter from 'vue-router'
Vue.use(VueRouter)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import SvgVue from 'svg-vue';
import Vue from 'vue';
Vue.use(SvgVue);

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)

import App from './App.vue'
import Index from './components/Main/Index.vue'
import Login from './components/Login/Index.vue'
import Regsister from './components/Regsister/Index.vue'
import Profile from './components/Profile/Index.vue'
import Product from './components/Product/Index.vue'
import Cart from './components/Cart/Index.vue'
import Search from './components/Search/Index.vue'
import Page404 from './components/Others/404.vue';
import Category from './components/Category/Index.vue';
const routers = [
    {
        name: "404",
        path: "*",
        component: Page404
    },
    {
        name: 'home',
        path: '/',
        component: Index
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'regsister',
        path: '/regsister',
        component: Regsister
    },
    {
        name: 'profile',
        path: '/profile/:option?',
        component: Profile
    },
    {
        name: "product_info",
        path: "/product/*-*.html",
        component: Product
    },
    {
        name: "cart_info",
        path: "/cart",
        component: Cart
    },
    {
        name: "search",
        path: "/search/:keyWord",
        component: Search
    },
    {
        name: "category",
        path: "/category/:id",
        component: Category
    }
]
Vue.prototype.userInfo = {
    status: null
};  
const router = new VueRouter({ mode: 'history', routes: routers});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
