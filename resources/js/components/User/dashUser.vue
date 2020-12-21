<template>  
  <v-app>
    
    <v-parallax
    height="750"
    src="https://www.enset-media.ac.ma/sites/default/files/enset_vue_aerienne.jpg"
  >
  
   <v-container>
        <v-layout row wrap>
            <v-flex xs12>
             
             

              
  <v-card
    class="mx-auto"
    max-width="600"
    
    
  >
    <v-img
      src="https://www.enset-media.ac.ma/sites/default/files/images_aticles/image1.jpeg"
      height="300px"
    ></v-img>

    <v-card-title >
      <strong>Cycle d'ingénieur</strong> 
    </v-card-title>
<v-card-subtitle>
      Le Cycle Ingénieur est un cursus de formation d'enseignement supérieur d'une durée de six semestres accessible selon des conditions. Le Cycle Ingénieur est sanctionné par un diplôme d'ingénieur d'Etat.
    </v-card-subtitle>


    <v-card-actions>
      <v-btn
        color="blue"
        text
      >
      <router-link to="/form" tag="span">inscrire</router-link>
        
      </v-btn>

      <v-spacer></v-spacer>
<strong>informations</strong>
      <v-btn
        icon
        @click="show = !show"
      >
         <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
      </v-btn>
    </v-card-actions>

    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>

        <v-card-text>
       
L'accès en première année d'une filière du cycle Ingénieur est ouvert : <br/>
> Aux candidats ayant validé les deux années du cycle préparatoire intégré. <br/>
> Aux candidats ayant réussi le concours national commun d’admission dans les établissements de formation d'ingénieurs et établissements assimilés et ce dans la limite des places offertes par l'Etablissement.<br/>
> Aux candidats ayant réussi le concours d’accès ouvert aux étudiants Bac+2 (DEUG, DUT, DEUST, DEUP ou tout autre diplôme reconnu équivalent) .
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>

            </v-flex>
        </v-layout>

    </v-container>
  
  
 
    <v-card
      flat
      tile
      class="brown lighten-5  black--text text-center foot"
    >
      <v-card-text>
        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-4 black--text"
          icon
        >
          <v-icon size="24px">
            {{ icon }}
          </v-icon>
        </v-btn>
      </v-card-text>

      <v-card-text class="black--text pt-0 ">
        <v-row
      justify="center"
      no-gutters
    >
      <v-btn
        v-for="link in links"
        :key="link"
        color="black"
        text
        rounded
        class="my-2"
      >
        {{ link }}
      </v-btn>
      </v-row>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="black--text">
        {{ new Date().getFullYear() }} — <strong>ENSET Concours</strong>
      </v-card-text>
    </v-card>
  </v-parallax>
   
    </v-app>
</template>

<script>
export default {
     data: () => ({
       condidacies : {},
      show: false,
            links: [
        'Home',
        'About Us',
        'Team',
        'Services',
        'Blog',
        'Contact Us',
      ],
       icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],

    }),
    created(){
         axios.get('/api/condidat')
  
  .then(response => {
    this.condidacies= response.data;
    console.log(response.data);
  })
  .catch(error => console.log(error))
       
    },
    
}
</script >

<style scoped>

</style>

      