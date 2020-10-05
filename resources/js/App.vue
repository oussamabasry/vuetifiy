<template>
    <v-app id="inspire">
        <loadPage/>
        <v-navigation-drawer relative left temporary v-model="drawer" app>
            <v-list nav dense class="mt-9">
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
                  <v-list-item-group v-else active-class="primary--text text--accent-4" >
                    <v-list-item
                    @click.prevent="Logout">

                        <v-list-item-title >
                             <v-icon class="mr-2">settings_power</v-icon>
                             Déconnexion
                        </v-list-item-title>

                    </v-list-item>
                </v-list-item-group>


            </v-list>
        </v-navigation-drawer>

        <v-app-bar class="green lighten-5 font-weight-medium mr-0 " height="55%" app>
            <v-app-bar-nav-icon class="hidden-sm-and-up" @click.stop="drawer = !drawer" ></v-app-bar-nav-icon>

        <router-link to="/" tag="span" style="cursor:pointer">
            <v-toolbar-title >
                <v-btn text class="btn rounded-xl" color="primary">
                   ENSET Concours
                </v-btn></v-toolbar-title >
        </router-link>

            <v-spacer></v-spacer>

            <v-toolbar-items  v-if="!userIsAuthenticated" class="hidden-xs-only mr-0 " >

                <v-btn
                small
                color="primary"
                v-for="item in menuItems"
                :key="item.title"  text
                class="btn  "

                :to="item.link">

              <!--<v-icon class="mr-2">{{item.icon}}</v-icon>-->
                   <span>{{item.title}}</span>

                </v-btn>

            </v-toolbar-items>
             <v-toolbar-items  v-else class="hidden-xs-only mr-0 " >

                <v-btn
                small
                color="primary"
                text
                class="btn  mx-1"
                @click.prevent="Logout"
                >

              <!--<v-icon class="mr-2">{{item.icon}}</v-icon>-->
                   Déconnexion

                </v-btn>

            </v-toolbar-items>


        </v-app-bar>

        <v-main>

            <router-view></router-view>

        </v-main>
    </v-app>
</template>

<script>
export default {
    data(){
       return {

           drawer: false,

       }
    },

computed:{
   menuItems(){
        let menuItems
        if(!this.userIsAuthenticated){
            menuItems = [
           {icon:'create',title:'S\'INSCRIRE',link:'/sign-up'},
           {icon:'lock_open',title:'CONNEXION',link:'/sign-in-user'},
           {icon:'admin_panel_settings',title:'ADMINISTRATEUR',link:'/sign-in-admin'},
        ]

        }
        else{
            menuItems=[
                 {icon:'settings_power',title:'Déconnexion',link:'/sign-up'},
            ]

        }
  return menuItems
    },
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

 @media screen and (max-width: 720px) and (min-width: 600px) {
  .btn{
  font-size: 10.6px;

}
}


.v-toolbar__items>.v-btn {
    height: 100%!important;
    max-height: none;
    margin: auto;
}


</style>
