<template>
  <v-card
      flat
      tile
      class="blue lighten-5 font-weight-medium  text-center foot mt-16"
    >
 

      <v-card-text class="primary--text pt-0 ">
        <v-row
      justify="center"
      no-gutters
    >
      <v-btn
        v-for="item in menuItems"
        :key="item.title"
        :to="item.link"
        color="primary"
        text
        rounded
        class="my-2 mx-10"
      >
        {{ item.title }}
      </v-btn>
      </v-row>
      <v-row
      justify="center"
      no-gutters
      class="my-3"
      >
      <a href="https://www.enset-media.ac.ma/" target="_blank" rel="noopener noreferrer">Site: www.enset-media.ac.ma</a>
    </v-row>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="primary--text">
        <strong>ENSET Concours © </strong>{{ new Date().getFullYear() }} 
      </v-card-text>
    </v-card>
</template>


<script>
  export default {
    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
            links: [
        'Home',
        'S\'inscrire',
        'Connexion',
      ],
      menuItems: [
                { title: "Home", link: "/" },
                { title: "S'inscrire", link: "/sign-up" },
                { title: "Connexion", link: "/sign-in-user" }
            ]
    }),
  }
</script>

<style lang="stylus" scoped>

</style>
