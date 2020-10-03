import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import  index from './components/index.vue'
import  SignInUser from './components/User/SignInUser.vue'
import  SignUp from './components/User/SignUp.vue'
import  SignInAdmin from './components/Admin/SignInAdmin.vue'
import  confirmationEmail from './components/User/confirmationEmail.vue'
import  myaccount from './components/User/myaccount.vue'
import Axios from 'axios';







const routes = [
    {
        path: '/',
        component:index,
        name:'index'
    },
    {
        path: '/sign-in-user',
        component:SignInUser,
        name:'SignInUser',
        beforeEnter: (to, from, next) =>{
            axios.get('/api/athentificated').then(()=>{
               return next({name:'myaccount'})
            }).catch(()=>{
                next()
            })
        }
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
    },
    {
        path:'/myaccount',
        component:myaccount,
        name:'myaccount',
        beforeEnter: (to, from, next) =>{
            axios.get('/api/athentificated').then(()=>{
                next()
            }).catch(()=>{
                return next({name:'SignInUser'})
            })
        }
    }





]

export default new Router({
    mode:'history',
    routes
})
