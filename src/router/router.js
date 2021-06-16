import Vue from 'vue'
import Home from '../views/Home.vue'
import Inscription from '../components/inscription.vue'

import VueRouter from 'vue-router'  //// import vue-router package


Vue.component('MYhome',Home) 
Vue.component('Inscription',Inscription) 





Vue.use(VueRouter)  ///. use this package Vuerouter


///// craete our path for the router
const Our__routes = [
                {path: '/home', component: Home},
                {path: '/', component: Home},          
]

///// create new Vuerouter and add our route to this new vuerouter
const router = new VueRouter({routes:Our__routes})

export default router