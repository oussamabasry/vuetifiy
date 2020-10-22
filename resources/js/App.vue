<template>
    <v-app id="inspire">
        <loadPage/>
                      <!--Menu Mobile-->
       
        <Navhome v-if="!userIsAuthenticated" />      
        <Navbar v-else />           <!-- End Menu Web-->

                             <!--Principal page-->
        <v-main>

            <router-view></router-view>

        </v-main>
                          <!--E ndPrincipal page -->
    </v-app>
</template>

<script>
import Navbar from './components/Navbar'
import Navhome from './components/Navhome'

export default {
    name:'App',
    components:{
        Navhome,
        Navbar
    },
    data(){
       return {

           drawer: false,
           menuItems : [
           {icon:'create',title:'S\'inscrire',link:'/sign-up'},
           {icon:'lock_open',title:'Connexion',link:'/sign-in-user'},
        ]

       }
    },

computed:{
    userIsAuthenticated(){
      return  this.$store.getters.user !== null && this.$store.getters.user !== undefined
    },
},


 mounted(){

        axios.get('/api/user').then((res)=>{
             this.$store.commit('setUser',res.data)
          }).catch((error)=>{
             this.$store.commit('setUser',null)
          })
 },


 methods:{
        Logout(){
             axios.post('/api/logout').then((res)=>{
                 this.$router.push({name:'index'})
                 this.$store.commit('setUser',null)
             })
        }
    },

};
</script>

<style scoped>

.btn{
 font-weight: bold;

}




.v-toolbar__items>.v-btn {
    height: 100%!important;
    max-height: none;
    margin: auto;
}

.v-btn {

    text-transform: none;

}


</style>
