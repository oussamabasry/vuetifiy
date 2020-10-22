<template>
  <v-layout row class="ma-10">
    <v-flex md12>
      <v-app style="background-color: white" class="ma-n4 ml-2">
        <v-container>

  <v-bottom-navigation
    color="red"
    grow
    class="mb-10"
  >
    <v-btn to="/seer-condidacies"> 
      <span>Candidatures</span>

      <v-icon>fa-clipboard-list</v-icon>
    </v-btn>

    <v-btn to="/seer-condidacies-accept">
      <span>Candidatures acceptées</span>

      <v-icon>fa-check-square</v-icon>
    </v-btn>

    <v-btn to="/seer-condidacies-rejected"> 
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
          Systèmes Electriques et Energies Renouvelables

          </v-alert>
           <v-alert
            class="mt-3 p-3"
            color="#2A3B4D"
            dark
            icon="fa-tasks"
            dense
          >
            Candidatures rejtées
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
          name: "Khalid IRAKI",
          age: 20,
          note: 16.78,
          diploma: "DUT",
          school: "ESTC",
        },
        {
          name: "Marwan EL MBARAA",
          age: 19,
          note: 13.5,
          diploma: "DEUP",
          school: "ENSM",
        },
       {
          name: "Halima MARWA",
          age: 22,
          note: 14.35,
          diploma: "BTS",
          school: "BTSC",
        },
      {
          name: "Ahmed NADIR",
          age: 20,
          note: 15.27,
          diploma: "DTS",
          school: "ISTAM",
        },
        {
          name: "Ismail Nassralah",
          age: 21,
          note: 17,
          diploma: "DEUP",
          school: "ENSC",
        },
       {
          name: "Zouhair Monaim",
          age: 21,
          note: 16.80,
          diploma: "DUEG",
          school: "FSAC",
        },
        {
          name: "Akram EL HILALI",
          age: 23,
          note: 17.4,
          diploma: "DEUST",
          school: "FSTG",
        },
        {
          name: "Anas KHIAT",
          age: 20,
          note: 15,
          diploma: "DUT",
          school: "ESTA",
        },
   
      ],
    };
  },
};
</script>