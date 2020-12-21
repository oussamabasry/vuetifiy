<template>
  

    <v-app>
    
   
      <v-card
    flat
    tile
  >
   <v-parallax src="https://www.wallpapertip.com/wmimgs/50-508418_blue-black-templates.jpg"  
     height="800">

    <v-container
     
      
      fluid
    >
    
      <p class="y">veuillez choisir la filière</p>
    
      

      <v-row  >
        <v-spacer></v-spacer>
        
        <v-col
         
          cols="5"
          sm="4"
         class="my-xs-12"
        
        >
        
          <v-card @click="start=!start " hover
          v-model="Glsid"
          shaped width="433" class="d-xs-block" >
            
              <span
                class="headline white--text  "
               
              > <p class="o"><strong>GIL-Génie Industriel et Logistique <br/> </strong> </p> </span>
          <v-img
              src="https://www.esiee.fr/sites/default/files/ill-fil-genieindus-8709cpsafgaudichoncciparisidf.jpg"
              height="266px"
              
            >
            </v-img>

            
          </v-card>
          
        </v-col>
       <v-col
         
          cols="5"
          sm="2"
          md="4"
          class="my-xs-12"
        >
        
          <v-card @click="gmsi=!gmsi" hover
          v-model="Glsid"
          shaped width="433" class=".d-{xs}-{block}" >
            
              <span
                class="headline white--text  "
               
              > <p class="o"><strong>GMSI - Génie Mécanique des Systèmes Industriels</strong> </p> </span>
          <v-img
              src="https://edito.regionsjob.com/observatoire-metier/wp-content/uploads/sites/4/2018/09/ing%C3%A9nieur-m%C3%A9canique.jpg"
              height="233px"
              
            >
            </v-img>

            
          </v-card>
        </v-col>
        
        <v-col
          
         
          cols="6"
          sm="2"
          md="4"
          class="my-xs-12"
        >
        
          <v-card @click="gecsi=!gecsi" hover
          v-model="gsi"
          shaped width="433"  >
            
              <span
                class="headline white--text  "
               
              > <p class="o"><strong>GECSI - Génie Electrique et Contrôle des Systèmes Industriels </strong> </p> </span>
          <v-img
              src="https://www.irem-france.com/upload-bloc_cms/armoire-electrique.jpg"
              height="233px"
              
            >
            </v-img>

            
          </v-card>
        </v-col>
       <v-col
          
        
          cols="5"
          sm="2"
          md="4"
          class="my-xs-12"
        >
        
          <v-card @click="seer=!seer" hover
          v-model="Glsid"
          shaped width="433"  
          class=".d-{xs}-{block}" >
            
              <span
                class="headline white--text  "
               
              > <p class="o"><strong>SEER -  Systèmes Electriques et Energies Renouvelables </strong> </p> </span>
          <v-img
              src="https://www.polymtl.ca/ge/sites/ge.amigow2020.polymtl.ca/files/ge_917x600_microelectronique.jpg"
              height="233px"
              
            >
            </v-img>

            
          </v-card>
        </v-col>
          <v-col
          
          
          cols="5"
          sm="2"
          md="4"
          class="my-xs-12"
        >
        
          <v-card @click="bdcc=!bdcc" hover
          v-model="Glsid"
          shaped width="430" 
          >
            
              <span
                class="headline white--text  "
               
              > <p class="o"><strong>II-BDCC - Ingénierie Informatique : Big Data et Cloud Computing</strong> </p> </span>
          <v-img
              src="https://connectedoctors.fr/wp-content/uploads/2016/02/big-data_1.jpg"
              height="233px"
              
            >
            </v-img>

            
          </v-card>
        </v-col>
          <v-col
          
        
          cols="5"
          sm="2"
          md="4"
          class="my-xs-12"

        >
        
          <v-card @click="stop=!stop" hover
          v-model="Glsid"
          shaped width="433"
          class=".d-{xs}-{block}" >
            
              <span
                class="headline white--text  "
               
              > <p class="o"><strong>GLSID - Génie du Logiciel et des Systèmes Informatiques Distribués</strong> </p> </span>
          <v-img
              src="https://www.infomediaire.net/wp-content/uploads/2017/12/informatique.jpg"
              height="233px"
              
            >
            </v-img>

            
          </v-card>
        </v-col>
      </v-row>
    </v-container>
     </v-parallax>
  </v-card>
  
  <v-row v-model="start" justify="center">
    <v-dialog
      v-model="start"
      
      persistent
      max-width="290"
    >
      <template >
        
      </template>
      <v-card>
        <v-card-title class="headline">
         N.B : Votre choix sera enregistré
        </v-card-title>
        
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="green darken-1"
            text
            @click="start = false"
          >
            Annuler
          </v-btn>
          <v-btn
            color="green darken-1"
            text
            @click="start = false"
            @click.prevent="gil"
          >
            Valider
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
   <v-row v-model="stop" justify="center">
    <v-dialog
      v-model="stop"
      
      persistent
      max-width="290"
    >
      <template >
        
      </template>
      <v-card>
        <v-card-title class="headline">
         N.B : Votre choix sera  enregistré
        </v-card-title>
        
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="green darken-1"
            text
            @click="stop = false"
          >
            Annuler
          </v-btn>
          <v-btn
            color="green darken-1"
            text
            @click="stop=false"
            @click.prevent="glsid"
          >
            Valider
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
  <v-row v-model="gecsi" justify="center">
    <v-dialog
      v-model="gecsi"
      
      persistent
      max-width="290"
    >
      <template >
        
      </template>
      <v-card>
        <v-card-title class="headline">
         N.B : Votre choix sera enregistré
        </v-card-title>
        
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="green darken-1"
            text
            @click="gecsi = false"
          >
            Annuler
          </v-btn>
          <v-btn
            color="green darken-1"
            text
            @click="gecsi=false"
            @click.prevent="Gecsi"
          >
            Valider
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
  <v-row v-model="seer" justify="center">
    <v-dialog
      v-model="seer"
      
      persistent
      max-width="290"
    >
      <template >
        
      </template>
      <v-card>
        <v-card-title class="headline">
         N.B : Votre choix sera enregistré
        </v-card-title>
        
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="green darken-1"
            text
            @click="seer= false"

          >
            Annuler
          </v-btn>
          <v-btn
            color="green darken-1"
            text
            @click="seer=false"
            @click.prevent="Seer"
          >
            Valider
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
  <v-row v-model="gmsi" justify="center">
    <v-dialog
      v-model="gmsi"
      
      persistent
      max-width="290"
    >
      <template >
        
      </template>
      <v-card>
        <v-card-title class="headline">
         N.B : Votre choix sera enregistré
        </v-card-title>
        
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="green darken-1"
            text
            @click="gmsi = false"
          >
            Annuler
          </v-btn>
          <v-btn
            color="green darken-1"
            text
            @click="gmsi=false"
            @click.prevent="Gmsi"
          >
            Valider
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
  <v-row v-model="bdcc" justify="center">
    <v-dialog
      v-model="bdcc"
      
      persistent
      max-width="290"
    >
      <template >
        
      </template>
      <v-card>
        <v-card-title class="headline">
         N.B : Votre choix sera  enregistré
        </v-card-title>
        
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="green darken-1"
            text
            @click="bdcc = false"
          >
            Annuler
          </v-btn>
          <v-btn
            color="green darken-1"
            text
            @click="bdcc=false"
            @click.prevent="Bddcc"
          >
            Valider
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
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
      <main>
        
        <router-view></router-view>
      </main>
  
    </v-app>
    
  
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
        'About Us',
        'Team',
        'Services',
        'Blog',
        'Contact Us',
      ],
      types: ['', ''],
      cards: ['GIL-Génie Industriel et Logistique'
      , 'GMSI - Génie Mécanique des Systèmes Industriels ', 'SEER - Génie Electrique option : Systèmes Electriques et Energies Renouvelables ','GECSI - Génie Electrique et Contrôle des Systèmes Industriels ','GLSID - Génie du Logiciel et des Systèmes Informatiques Distribués',"II-BDCC - Ingénierie Informatique : Big Data et Cloud Computing "],
      
   
      start:false,
      stop:false,
      Glsid:'',
      Bdcc:'',
      gsi:'',
      gmsi:false,
      seer:false,
      bdcc:false,
      gecsi:false,
    }),
     

    methods: {
      getImage () {
        const min = 550
        const max = 560

        return Math.floor(Math.random() * (max - min + 1)) + min
      },
      glsid() {
        axios.post('/api/glsid', this.Glsid)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
      },
       Bddcc() {
        axios.post('/api/condidacies', this.Glsid)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
      },
       Gecsi() {
        axios.post('/api/gecsii', this.gsi)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
      },
       Seer() {
        axios.post('/api/seer', this.Glsid)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
      },
       Gmsi() {
        axios.post('/api/gmsi', this.Glsid)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
      },
       gil() {
        axios.post('/api/gil', this.Glsid)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
      },
    },
  }
</script>

<style lang="scss">
.o{
  margin-top: 11px;
 margin-left: 10px;
  color:rgb(29, 22, 61);
}
.y{
  font-size: 3em;
   
    color:rgb(253, 252, 252);
    text-shadow: 4px 7px 3px rgb(8, 8, 8);
    
    
    
}
</style>