import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import  index from './components/index.vue'
import  SignInUser from './components/User/SignInUser.vue'
import  SignUp from './components/User/SignUp.vue'
import  confirmationEmail from './components/User/confirmationEmail.vue'
import  dashUser from './components/User/dashUser.vue'
import  resetPassword from './components/User/resetPassword.vue'
import  confirmemail from './components/User/confirmemail.vue'
import  dashAdmin from './components/Admin/dashAdmin.vue'
import Axios from 'axios';







const routes = [
    {
        path: '/',
        component:index,
        name:'index',

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
        name:'SignUp',
        beforeEnter: (to, from, next) =>{
            axios.get('/api/athentificated').then(()=>{
               return next({name:'myaccount'})
            }).catch(()=>{
                next()
            })
        }
    },

    {
        path:'/confirmation-email',
        component:confirmationEmail,
        name:'confirmationEmail'
    },
    {
        path:'/dashUser',
        component:dashUser,
        name:'dashUser',
        beforeEnter: (to, from, next) =>{
            axios.get('/api/athentificated').then(()=>{
                next()
            }).catch(()=>{
                return next({name:'SignInUser'})
            })
        }
    },
    {
        path:'/reset-password',
        component:resetPassword,
        name:'resetPassword'
    },

    {

        path:'/confirm-email',
        component:confirmemail,
        name:'confirmemail'
    },

    {

        path:'/dash-admin',
        component:dashAdmin,
        name:'dashAdmin',
        beforeEnter: (to, from, next) =>{
            axios.get('/api/athentificated').then(()=>{
                next()
            }).catch(()=>{
                return next({name:'SignInUser'})
            })
        }
    },






]

export default new Router({
    mode:'history',
    routes
})
