<template>
    <v-app id="inspire">

        <v-navigation-drawer absolute left temporary v-model="drawer" app>
            <v-list nav dense class="mt-9">
                <v-list-item-group  active-class="red--text text--accent-4" >
                    <v-list-item
                    v-for="item in menuItems"
                    :key="item.title"
                    router
                    :to="item.link">

                        <v-list-item-title >
                             <v-icon class="mr-2">{{item.icon}}</v-icon>
                             {{item.title}}
                        </v-list-item-title>

                    </v-list-item>

                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar class="cyan darken-4 font-weight-medium mr-0 " dark app>
            <v-app-bar-nav-icon class="hidden-sm-and-up" @click.stop="drawer = !drawer" ></v-app-bar-nav-icon>

        <router-link to="/" tag="span" style="cursor:pointer">
            <v-toolbar-title router >
                <v-btn text class="btn" >
                   ENSET Concours
                </v-btn></v-toolbar-title >
        </router-link>

            <v-spacer></v-spacer>

            <v-toolbar-items class="hidden-xs-only mr-0 " >

                <v-btn
                v-for="item in menuItems"
                :key="item.title"  text
                class="btn font-weight-medium"
                router
                :to="item.link">

                   <v-icon class="mr-2">{{item.icon}}</v-icon>
                   {{item.title}}

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
           menuItems:[
               {icon:'create',title:'S\'INSCRIRE',link:'/sign-up'},
               {icon:'lock_open',title:'CONNEXION',link:'/sign-in-user'},
               {icon:'local_police',title:'ADMIN',link:'/sign-in-admin'},
           ]
       }
    }
};
</script>

<style scoped>

 @media screen and (max-width: 720px) and (min-width: 600px) {
  .btn{
  font-size: 11.5px;
  font-weight: bold;
}
}



</style>
