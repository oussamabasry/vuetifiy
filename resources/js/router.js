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
import glsidCondidat from './components/Admin/Glsid/glsidCondidat'
import glsidAccept from './components/Admin/Glsid/glsidAccept'
import glsidRejected from './components/Admin/Glsid/glsidRejected'
import bdccCondidat from './components/Admin/Bdcc/bdccCondidat'
import bdccAccept from './components/Admin/Bdcc/bdccAccept'
import bdccRejected from './components/Admin/Bdcc/bdccRejected'
import gilCondidat from './components/Admin/Gil/gilCondidat'
import gilAccept from './components/Admin/Gil/gilAccept'
import gilRejected from './components/Admin/Gil/gilRejected'
import gmsiCondidat from './components/Admin/Gmsi/gmsiCondidat'
import gmsiAccept from './components/Admin/Gmsi/gmsiAccept'
import gmsiRejected from './components/Admin/Gmsi/gmsiRejected'
import seerCondidat from './components/Admin/Seer/seerCondidat'
import seerAccept from './components/Admin/Seer/seerAccept'
import seerRejected from './components/Admin/Seer/seerRejected'
import gecsiCondidat from './components/Admin/Gecsi/gecsiCondidat'
import gecsiAccept from './components/Admin/Gecsi/gecsiAccept'
import gecsiRejected from './components/Admin/Gecsi/gecsiRejected'


import condidacies from './components/Admin/condidacies'
import condidaciesAccepted from './components/Admin/condidaciesAccepted'
import condidaciesRejected from './components/Admin/condidaciesRejected'


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
               return next({name:'dashUser'})
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
               return next({name:'dashUser'})
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

    {
        path:'/glsid-condidacies',
        component:glsidCondidat,
        name:'glsidCondidat'
    },

    {
        path:'/glsid-condidacies-accept',
        component:glsidAccept,
        name:'glsidAccept'
    },
    {
        path:'/glsid-condidacies-rejected',
        component:glsidRejected,
        name:'glsidRejected'
    },

    {
        path:'/bdcc-condidacies', 
        component:bdccCondidat,
        name:'bdccCondidat'
    },

    {
        path:'/bdcc-condidacies-accept',
        component:bdccAccept,
        name:'bdccAccept'
    },
    {
        path:'/bdcc-condidacies-rejected',
        component:bdccRejected,
        name:'bdccRejected'
    },

    {
        path:'/gil-condidacies', 
        component:gilCondidat,
        name:'gilCondidat'
    },

    {
        path:'/gil-condidacies-accept',
        component:gilAccept,
        name:'gilAccept'
    },
    {
        path:'/gil-condidacies-rejected',
        component:gilRejected,
        name:'gilRejected'
    },
    {
        path:'/gmsi-condidacies', 
        component:gmsiCondidat,
        name:'gmsiCondidat'
    },

    {
        path:'/gmsi-condidacies-accept',
        component:gmsiAccept,
        name:'gmsiAccept'
    },
    {
        path:'/gmsi-condidacies-rejected',
        component:gmsiRejected,
        name:'gmsiRejected'
    },

    {
        path:'/seer-condidacies', 
        component:seerCondidat,
        name:'seerCondidat'
    },

    {
        path:'/seer-condidacies-accept',
        component:seerAccept,
        name:'seerAccept'
    },
    {
        path:'/seer-condidacies-rejected',
        component:seerRejected,
        name:'seerRejected'
    },
    {
        path:'/gecsi-condidacies', 
        component:gecsiCondidat,
        name:'gecsiCondidat'
    },

    {
        path:'/gecsi-condidacies-accept',
        component:gecsiAccept,
        name:'gecsiAccept'
    },
    {
        path:'/gecsi-condidacies-rejected',
        component:gecsiRejected,
        name:'gecsiRejected'
    },

   /*  associer */
   {
    path:'/condidacies', 
    component:condidacies,
    name:'condidacies'
},

{
    path:'/condidacies-accepted',
    component:condidaciesAccepted,
    name:'condidaciesAccepted'
},
{
    path:'/condidacies-rejected',
    component:condidaciesRejected,
    name:'condidaciesRejected'
},









]

export default new Router({
    mode:'history',
    routes
})
