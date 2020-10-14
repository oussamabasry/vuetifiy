<template>
    <v-app id="inspire">
        <loadPage/>
                      <!--Menu Mobile-->
        <v-navigation-drawer relative left temporary v-model="drawer" app>
            <v-list nav dense class="mt-9">

          <!-- Menu when user is not authenticated version mobile-->
                <v-list-item-group v-if="!userIsAuthenticated" active-class="primary--text text--accent-4" >
                    <v-list-item

                    v-for="item in menuItems"
                    :key="item.title"
                    :to="item.link">

                        <v-list-item-title >
                             <v-icon class="mr-2">{{item.icon}}</v-icon>
                             {{item.title}}
                        </v-list-item-title>

                    </v-list-item>
                </v-list-item-group>
           <!-- End Menu when user is not authenticated version mobile-->

            <!-- Menu when user is authenticated version mobile-->
                  <v-list-item-group v-else active-class="primary--text text--accent-4" >

                    <v-list-item to="/myaccount">
                        <v-list-item-title  >
                             <v-icon class="mr-2">person</v-icon>
                             Mon compte
                        </v-list-item-title>
                    </v-list-item>

                     <v-list-item @click.prevent="Logout" >
                        <v-list-item-title>
                             <v-icon class="mr-2">settings_power</v-icon>
                             Déconnexion
                        </v-list-item-title>
                    </v-list-item>
            <!-- End Menu when user is authenticated version mobile-->
                </v-list-item-group>

            </v-list>
        </v-navigation-drawer>
                                <!--End Menu Mobile-->

                                <!-- Menu Web-->
        <v-app-bar class="green lighten-5 font-weight-medium mr-0 " height="52%" app>
            <v-app-bar-nav-icon class="hidden-sm-and-up" @click.stop="drawer = !drawer" ></v-app-bar-nav-icon>

            <router-link to="/" tag="span" style="cursor:pointer">
               <v-toolbar-title >
                <v-btn text class="btn rounded-xl" color="primary">
                   ENSET Concours
                </v-btn></v-toolbar-title >
            </router-link>

            <v-spacer></v-spacer>

            <!-- if user is authenticated version web-->
            <v-toolbar-items   v-if="!userIsAuthenticated" class="hidden-xs-only mr-0 " >
              <v-btn small color="primary" v-for="item in menuItems" :key="item.title"
                 text class="btn" width="150px" :to="item.link">
                 <v-icon class="mr-2">{{item.icon}}</v-icon>
                 {{item.title}}
              </v-btn>
            </v-toolbar-items>
             <!-- End Menu user is authenticated version web-->

             <!-- Menu when user is not authenticated version web-->
             <v-toolbar-items  v-else class="hidden-xs-only mr-0 " >

                <v-btn small color="primary" text class="btn" width="150px" to="/myaccount">
                      <v-icon class="mr-2">person</v-icon>
                       Mon compte
                </v-btn>

                <v-btn small color="primary" text class="btn" width="150px" @click.prevent="Logout">
                      <v-icon class="mr-2">settings_power</v-icon>
                      Déconnexion
                </v-btn>

            </v-toolbar-items>
            <!-- End Menu when user is not authenticated version web-->

        </v-app-bar>
                             <!-- End Menu Web-->

                             <!--Principal page-->
        <v-main>

            <router-view></router-view>

        </v-main>
                          <!--E ndPrincipal page -->
    </v-app>
</template>

<script>
export default {
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
