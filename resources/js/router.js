import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import index from './components/index.vue'
import SignInUser from './components/User/SignInUser.vue'
import SignUp from './components/User/SignUp.vue'
import dashUser from './components/User/dashUser.vue'
import resetPassword from './components/User/resetPassword.vue'
import confirmemail from './components/User/confirmemail.vue'
import condidacies from './components/Admin/condidacies'
import condidaciesAccepted from './components/Admin/condidaciesAccepted'
import condidaciesRejected from './components/Admin/condidaciesRejected'


import store from './store/index'




const routes = [
    
    {
        path: '/condidacies',
        component: condidacies,
        name: 'condidacies',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (to.name !== 'SignInUser' && !isAuthenticated) next({ name: 'SignInUser' })
            else if(role === 'user') next({name: 'dashUser'})
            else next()
          }

    },
    {
        path: '/condidacies-accepted',
        component: condidaciesAccepted,
        name: 'condidaciesAccepted',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (to.name !== 'SignInUser' && !isAuthenticated) next({ name: 'SignInUser' })
            else if(role === 'user') next({name: 'dashUser'})
            else next()
          }
    },
    {
        path: '/condidacies-rejected',
        component: condidaciesRejected,
        name: 'condidaciesRejected',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (to.name !== 'SignInUser' && !isAuthenticated) next({ name: 'SignInUser' })
            else if(role === 'user') next({name: 'dashUser'})
            else next()
          }
    },
    
    
    {
        path: '/',
        component: index,
        name: 'index',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (isAuthenticated && role==='admin') next({ name: 'condidacies' })
            else  if (isAuthenticated && role==='user') next({ name: 'dashUser' })
            else next()
          }

    },
    {
        path: '/sign-in-user',
        component: SignInUser,
        name: 'SignInUser',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (isAuthenticated && role ==='admin') next({ name: 'condidacies' })
            if (isAuthenticated && role ==='user') next({ name: 'dashUser' })
            else next()
          }
    },
    {
        path: '/sign-up',
        component: SignUp,
        name: 'SignUp',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (isAuthenticated && role ==='admin') next({ name: 'condidacies' })
            if (isAuthenticated && role ==='user') next({ name: 'dashUser' })
            else next()
          }
    },

    {
        path: '/dashUser',
        component: dashUser,
        name: 'dashUser',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (to.name !== 'SignInUser' && !isAuthenticated) next({ name: 'SignInUser' })
            else if(role === 'admin') next({name: 'condidacies'})
            else next()
          }
    },
    {
        path: '/reset-password',
        component: resetPassword,
        name: 'resetPassword',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (isAuthenticated && role ==='admin') next({ name: 'condidacies' })
            if (isAuthenticated && role ==='user') next({ name: 'dashUser' })
            else next()
          }
    },

    {

        path: '/confirm-email',
        component: confirmemail,
        name: 'confirmemail',
        beforeEnter: (to, from, next) => {
            const isAuthenticated = store.getters.isLoggedIn;
            const role =  localStorage.getItem('role');
            if (isAuthenticated && role ==='admin') next({ name: 'condidacies' })
            if (isAuthenticated && role ==='user') next({ name: 'dashUser' })
            else next()
          }
    },



]

export default new Router({
    mode: 'history',
    routes
})
