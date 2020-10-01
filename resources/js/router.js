import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import  index from './components/index.vue'
import  SignInUser from './components/User/SignInUser.vue'
import  SignUp from './components/User/SignUp.vue'
import  SignInAdmin from './components/Admin/SignInAdmin.vue'
import  confirmationEmail from './components/User/confirmationEmail.vue'







const routes = [
    {
        path: '/',
        component:index,
        name:'index'
    },
    {
        path: '/sign-in-user',
        component:SignInUser,
        name:'SignInUser'
    },
    {
        path: '/sign-up',
        component:SignUp,
        name:'SignUp'
    },
    {
        path: '/sign-in-admin',
        component:SignInAdmin,
        name:'SignInAdmin'
    },
    {
        path:'/confirmation-email',
        component:confirmationEmail,
        name:'confirmationEmail'
    }





]

export default new Router({
    mode:'history',
    routes
})
