<template>
  <v-layout row class="ma-10">
    <v-flex md12>
      <v-app style="background-color: white" class="ma-n4 ml-2">
        <v-container>

  <v-bottom-navigation
    color="#1D8348"
    grow
    class="mb-10"
  >
    <v-btn to="/bdcc-condidacies"> 
      <span>Candidatures</span>

      <v-icon>fa-clipboard-list</v-icon>
    </v-btn>

    <v-btn to="/bdcc-condidacies-accept">
      <span>Candidatures acceptées</span>

      <v-icon>fa-check-square</v-icon>
    </v-btn>

    <v-btn to="/bdcc-condidacies-rejected">
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
          Ingénierie Informatique : Big Data et Cloud Computing
          </v-alert>
           <v-alert
            class="mt-3 p-3"
            color="#2A3B4D"
            dark
            icon="fa-tasks"
            dense
          >
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
          >
            <template v-slot:top> </template>
          </v-data-table>
        </v-container>
      </v-app>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  data() {
    return {
    

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
      desserts: [
         {
          name: "Oumaima ABOUTARA",
          age: 21,
          note: 18.99,
          diploma: "DEUST",
          school: "FSTM",
        },
        {
          name: "Amine RAMI",
          age: 21,
          note: 14,
          diploma: "DEUG",
          school: "FSBM",
        },
  
     
       
   
      ],
    };
  },
};
</script>