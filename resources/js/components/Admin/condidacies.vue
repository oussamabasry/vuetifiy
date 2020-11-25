<template>
  <v-layout row class="ma-10">
    <v-app-bar-nav-icon class="mb-3" @click.stop="drawing"></v-app-bar-nav-icon>

    <v-flex md12>
      <v-app style="background-color: white" class="ma-n4 ml-2">
        <v-container>
          <v-bottom-navigation color="#2471A3 " grow class="mb-3">
            <v-btn to="/condidacies">
              <span>Candidatures</span>

              <v-icon>fa-clipboard-list</v-icon>
            </v-btn>

            <v-btn to="/condidacies-accepted">
              <span>Acceptées</span>

              <v-icon>fa-check-square</v-icon>
            </v-btn>

            <v-btn to="/condidacies-rejected">
              <span>Rejtées</span>

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
            {{ getFullBranch }}
          </v-alert>
          <v-alert class="mt-3 p-3" color="#2A3B4D" dark icon="fa-tasks" dense>
            Candidatures
          </v-alert>
          <v-data-table
            v-model="selected"
            :headers="headers"
            :items="getListCondidaciesFilter"
            :items-per-page="5"
            :single-select="singleSelect"
            item-key="name"
            show-select
            class="elevation-1"
            @click:row="handleRowClick"
          >
            <template v-slot:top> </template>
          </v-data-table>
        </v-container>
      </v-app>
    </v-flex>

    <v-row justify="center" v-if="item != null">
      <v-dialog v-model="dialog" width="600px">
        <v-card>
          <v-card-title class="cyan darken-1">
            <span class="headline white--text">Dossier de candidature</span>
          </v-card-title>

          <v-list class="mt-7">
            <v-list-item>
              <v-list-item-action>
                <v-icon>account_circle</v-icon>
              </v-list-item-action>

              <v-list-item-content>
                <v-list-item-title class="mx-auto">
                  {{ item.firstname }} {{ item.lastname }} , {{ item.age }} ans
                  , {{ item.sexe }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-divider inset></v-divider>

            <v-list-item>
              <v-list-item-action>
                <v-icon>mdi-email</v-icon>
              </v-list-item-action>

              <v-list-item-content>
                <v-list-item-title> {{ item.CNE }} </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-divider inset></v-divider>

            <v-list-item>
              <v-list-item-action>
                <v-icon>school</v-icon>
              </v-list-item-action>

              <v-list-item-content>
                <v-list-item-title>
                  {{ item.diploma }}, {{ item.specialty_bac2 }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-divider inset></v-divider>

            <v-list-item>
              <v-list-item-action>
                <v-icon>mdi-phone</v-icon>
              </v-list-item-action>

              <v-list-item-content>
                <v-list-item-title> {{ item.phonenumber }} </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-divider inset></v-divider>
          </v-list>

          <div class="pa-4">
            <v-chip-group color="primary" active-class="primary--text" column>
              <v-chip class="mr-2"> S1: {{ item.grade_s1 }} </v-chip>
              <v-chip class="mx-2"> S2: {{ item.grade_s2 }} </v-chip>
              <v-chip class="mx-2"> S3: {{ item.grade_s3 }} </v-chip>
              <v-chip class="mx-2"> S4: {{ item.grade_s4 }} </v-chip>
              <v-chip class="mx-2"> Diplome: {{ item.note }} </v-chip>
            </v-chip-group>
          </div>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="dialog = false"> Fermer </v-btn>
            <v-btn @click="refuse(item.id)" color="error"> Refuser </v-btn>
            <v-btn color="success" @click="accept(item.id)"> Accepter </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  </v-layout>
</template>



<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";


export default {
  data() {
    return {
      item: null,
      dialog: false,
      singleSelect: false,
      selected: [],
      headers: [
        {
          text: "Prénom",
          value: "firstname",
        },
        {
          text: "Nom",
          value: "lastname",
        },
        { text: "Note diplome", value: "note" },
        { text: "Âge", value: "age" },
        { text: "Diplôme", value: "diploma" },
        { text: "Spécialité bac+2", value: "specialty_bac2" },
      ],
    };
  },

  methods: {
    ...mapActions([
      "upDateCondidacies",
      "acceptCondidacie",
      "refuseCondidacie",
      "",
    ]),

  
    handleRowClick(item) {
      this.dialog = !this.dialog;
      this.item = item;
    },
    accept(idCondidacie) {
      this.acceptCondidacie(idCondidacie);
      this.dialog = !this.dialog;
    },
    refuse(idCondidacie) {
      this.refuseCondidacie(idCondidacie);
      this.dialog = !this.dialog;
    },

    drawing() {
      this.$store.commit("changeDrawer", this.drawer);
    },
  },

  computed: {
    ...mapGetters(["getListCondidacies", "getFullBranch", "drawer"]),

    getListCondidaciesFilter() {
      return this.getListCondidacies.filter(function (condidate) {
        return condidate.accepted === null;
      });
    },
  },
};
</script>