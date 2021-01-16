<template>
  <div class="">

  <v-carousel
    cycle
    height="300"
    hide-delimiter-background
    show-arrows-on-hover

  >
    <v-carousel-item
      v-for="(slide, i) in slides"
      :key="i"

    >
      <v-sheet
        :color="colors[i]"
        height="100%"
      >
        <v-row
          class="fill-height"
          align="center"
          justify="center"
        >
          <div class="display-3" width="100%" hight="100%">
            <img :src="slide" /> 
          </div>
        </v-row>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>

 

 
    <v-row no-gutters class="py-4 pt-8">
      <v-col
        cols="12"
        sm="4"
      >
      <v-card
    class="mx-auto"
    max-width="344"
  >
    <v-img
      src="1.1.jpg"
      height="200px"
    ></v-img>

    <v-card-title>
      Département: Math et Info
    </v-card-title>

    <v-card-subtitle>
      Diplôme: Ingénieur d'état
    </v-card-subtitle>

    <v-card-actions>
      <v-btn
        color="orange lighten-2"
        text
      >
        
      </v-btn>

      <v-spacer></v-spacer>

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
          Ingénieur informatique est plus qu'un métier. Dans une PME ou une petite structure, l'ingénieur informatique fait office de touche-à-tout : construction et entretien du réseau informatique, gestion des parcs matériels, voire développement informatique et développement logiciel.
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
  </v-col>
  <v-col
        cols="12"
        sm="4"
      >
  <v-card
    class="mx-auto"
    max-width="344"
  >
    <v-img
      src="1.2.jpg"
      height="200px"
    ></v-img>

    <v-card-title>
      Département : Génie Electrique

    </v-card-title>

    <v-card-subtitle>
      Diplôme: Ingénieur d'état
    </v-card-subtitle>

    <v-card-actions>
      <v-btn
        color="orange lighten-2"
        text
      >
        
      </v-btn>

      <v-spacer></v-spacer>

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
          L'ingénieur électricien développe les réseaux d'électricité, conçoit des équipements électriques, améliore l'installation d'un hôpital... Il travaille principalement chez les producteurs d'énergie, dans des entreprises industrielles ou du BTP.
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
  </v-col>
  <v-col
        cols="12"
        sm="4"
      >
        <v-card
    class="mx-auto"
    max-width="344"
  >
    <v-img
      src="1.3.jpg"
      height="200px"
    ></v-img>

    <v-card-title>
      Département : Génie Mécanique
    </v-card-title>

    <v-card-subtitle>
      Diplôme: Ingénieur d'état
    </v-card-subtitle>

    <v-card-actions>
      <v-btn
        color="orange lighten-2"
        text
      >
        
      </v-btn>

      <v-spacer></v-spacer>

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
          Les grandes entreprises du secteur automobile, aéronautique, mécanique, chimique... emploient des ingénieurs mécaniciens. Les cabinets d'études, les sociétés d'ingénierie et de maintenance industrielle sont également des recruteurs possibles.
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
      </v-col>
    </v-row>
  

  <foot/>


  </div>

  
</template>

<script>
  export default {
    data () {
      return {
        colors: [
          'White',
          'warning',
          'pink darken-2',
          'red lighten-1',
          
        ],
        slides: ["/images/3.png","/images/4.jpg","/images/1.png",],
        
      show: false,
    
      }
    },
  }
</script>


