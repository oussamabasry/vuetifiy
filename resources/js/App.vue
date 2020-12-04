<template>
    <v-app id="inspire">
        <loadPage/>
                      <!--Menu Mobile-->
    
        <Navhome v-if="!userIsAuthenticated" />      
        <Navbar v-if="userIsAuthenticated && drawer " />           <!-- End Menu Web-->

                             <!--Principal page-->
        <v-main>

            <router-view></router-view>

        </v-main>
                          <!--E ndPrincipal page -->
    </v-app>
</template>

<script>
import { mapGetters } from "vuex";
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
           menuItems : [
           {icon:'create',title:'S\'inscrire',link:'/sign-up'},
           {icon:'lock_open',title:'Connexion',link:'/sign-in-user'},
        ]

       }
    },



computed:{
     ...mapGetters(["drawer"]),
    userIsAuthenticated(){
      return  this.$store.getters.isLoggedIn;
    },
     getUser(){
        return this.$store.getters.user
    }
},


 mounted(){

         axios.post('/api/auth/me',{}, {
                    headers: {
                        'Authorization': `bearer ${this.$store.getters.token}`
                    }
                    }).then((res)=>{
              this.$store.commit('setUser',res.data)
          }).catch((error)=>{
          })

 },


 methods:{
     Logout() {
          
            this.$store.dispatch("logout").then(() => {
                this.$router.push("/sign-in-user");
            });
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
