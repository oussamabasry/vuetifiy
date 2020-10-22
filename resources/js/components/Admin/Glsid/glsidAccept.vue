<template>
  <v-layout row class="ma-10">
    <v-flex md12>
      <v-app style="background-color: white" class="ma-n4 ml-2">
        <v-container>
          <v-bottom-navigation color="#1D8348" grow class="mb-10">
            <v-btn to="/glsid-condidacies">
              <span>Candidatures</span>

              <v-icon>fa-clipboard-list</v-icon>
            </v-btn>

            <v-btn to="/glsid-condidacies-accept">
              <span>Candidatures acceptées</span>

              <v-icon>fa-check-square</v-icon>
            </v-btn>

            <v-btn to="/glsid-condidacies-rejected">
              <span>Candidatures rejtées</span>

              <v-icon>mdi-delete</v-icon>
            </v-btn>
          </v-bottom-navigation>

          <v-alert
            class="mt-3 p-3"
            color="#C51162"
            dark
            icon="fa-laptop-code"
            dense
          >
            Génie du Logiciel et des Systèmes Informatiques Distribués
          </v-alert>
          <v-alert class="mt-3 p-3" color="#2A3B4D" dark icon="fa-tasks" dense>
            Candidatures acceptées
          </v-alert>
          <v-data-table
            v-model="selected"
            :headers="headers"
            :items="desserts"
            :items-per-page="5"
            :single-select="singleSelect"
            item-key="name"
            show-select
            class="elevation-1"
            @click:row="dialog=!dialog"
          >
            <template v-slot:top > </template>
          </v-data-table>
        </v-container>
      </v-app>
    </v-flex>

    <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="290">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="primary" dark v-bind="attrs" v-on="on">
            Open Dialog
          </v-btn>
        </template>
        <v-card>
          <v-card-title class="headline">
            Use Google's location service?
          </v-card-title>
          <v-card-text
            >Let Google help apps determine location. This means sending
            anonymous location data to Google, even when no apps are
            running.</v-card-text
          >
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="green darken-1" text @click="dialog = false">
              Disagree
            </v-btn>
            <v-btn color="green darken-1" text @click="dialog = false">
              Agree
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>

    <foot />
  </v-layout>
</template>

<script>
export default {


  data() {
    return {
      
      dialog: false,
      singleSelect: false,
      selected: [],
      headers: [
        
        {
          text: "Nom & prénom",
          align: "start",
          sortable: false,
          value: "name",
        },
        { text: "Âge", value: "age" },
        { text: "Diplôme", value: "diploma" },
        { text: "Note diplome", value: "note" },
        { text: "Établissement ", value: "school" },
      ],
      desserts: []
   
    };
  },

  methods:{
  getCondidateById(condidateId){

    return this.$store.getters.getCondidateById(condidateId)
  },
  
},

// mounted(){
//     this.desserts = this.$store.getters.getCondidates
//   },



};
</script>