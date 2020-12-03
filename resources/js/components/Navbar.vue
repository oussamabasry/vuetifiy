<template>
  <nav>
    <v-navigation-drawer v-model="drawer" dark app color="#2A3B4D" class="py-0">
      <v-container>
        <v-row>
          <v-col md="9">
            <v-progress-circular
              :rotate="300"
              :size="50"
              :width="7"
              :value="value"
              color="lime accent-3"
              class="mt-n1"
            >
              {{ value }}
            </v-progress-circular>
          </v-col>

          <!-- <v-col md="3">
                            <v-icon right class="mt-1">fa-bars</v-icon>
                       </v-col> -->
        </v-row>
      </v-container>
      <v-list nav>
        <v-list-item @click="changeToGlsid" router to="/condidacies">
          <v-list-item-action>
            <v-icon small>fa-laptop-code</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>GLSID</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="changeToBdcc" router to="/condidacies">
          <v-list-item-action>
            <v-icon small>fa-cloud-upload-alt</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>II-BDCC </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="changeToGil" router to="/condidacies">
          <v-list-item-action>
            <v-icon small>fa-industry</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>GIL</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="changeToGmsi" router to="/condidacies">
          <v-list-item-action>
            <v-icon small>fa-wrench</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>GMSI</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="changeToSeer" router to="/condidacies">
          <v-list-item-action>
            <v-icon small>fa-solar-panel</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>SEER</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="changeToGecsi" router to="/condidacies">
          <v-list-item-action>
            <v-icon small>fa-plug</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>GECSI</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <v-layout
        row
        class="mb-4 ml-2"
        style="position: absolute; bottom: 0; width: 100%"
      >
        <v-flex md-10>
          <v-list-item dense>
            <v-list-item-avatar class="ml-2">
              <v-img src="/03.png"></v-img>
            </v-list-item-avatar>

        
          </v-list-item>
        </v-flex>
        <v-flex md-2>
          <v-tooltip top>
            <template v-slot:activator="{ on }">
              <v-btn text icon v-on="on" @click="Logout" class="mt-2">
                <v-icon dark="" right>fa-sign-out-alt</v-icon>
              </v-btn>
            </template>
            <span>Exit</span>
          </v-tooltip>
        </v-flex>

       
      </v-layout>
    </v-navigation-drawer>
  </nav>
</template>

<script>
import { mapActions } from 'vuex';
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      interval: {},
      value: 0,
    };
  },
  beforeCreate(){
      this.$store.dispatch('upDateCondidacies')
  },
  beforeDestroy() {
    clearInterval(this.interval);
  },
   computed: {
    ...mapGetters([
      "drawer"
    ]),
   },

  mounted() {
    this.interval = setInterval(() => {
      if (this.value === 100) {
        return (this.value = 0);
      }
      this.value += 10;
    }, 1000);
  },

  methods: {

      ...mapActions([
      'upDateCondidacies', 
      
    ]),
    
    changeToGlsid() {
      this.$store.commit(
        "setFullBranch",
        "Génie du Logiciel et des Systèmes Informatiques Distribués"  
      );
      this.$store.commit("setDepartement","Département Mathématique et Informatique");
      this.$store.commit("setBranch", "GLSID");
      this.$store.dispatch('upDateCondidacies');
      this.$store.commit("changeDrawer",this.drawer);
    },
    changeToBdcc() {
      this.$store.commit(
        "setFullBranch",
        "Ingénierie Informatique : Big Data et Cloud Computing (II-BDCC)"
      );
      this.$store.commit("setDepartement","Département Mathématique et Informatique");
      this.$store.commit("setBranch", "BDCC");
      this.$store.dispatch('upDateCondidacies');
      this.$store.commit("changeDrawer",this.drawer);
    },
    changeToGil() {
      this.$store.commit("setFullBranch", "Génie Industriel et Logistique (GIL)");
      this.$store.commit("setDepartement","Département Génie Mécanique");
      this.$store.commit("setBranch", "GIL");
      this.$store.dispatch('upDateCondidacies');
      this.$store.commit("changeDrawer",this.drawer);
    },
    changeToGmsi() {
      this.$store.commit(
        "setFullBranch",
        "Génie Mécanique des Systèmes Industriels (GMSI)"
      );
      this.$store.commit("setDepartement","Département Génie Mécanique");
      this.$store.commit("setBranch", "GMSI");
      this.$store.dispatch('upDateCondidacies');
      this.$store.commit("changeDrawer",this.drawer);
    },
    changeToSeer() {
      this.$store.commit(
        "setFullBranch",
        "Systèmes Electriques et Energies Renouvelables (SEER)"
      );
      this.$store.commit("setDepartement","Département Génie Electrique");
      this.$store.commit("setBranch", "SEER");
      this.$store.dispatch('upDateCondidacies');
      this.$store.commit("changeDrawer",this.drawer);
    },
    changeToGecsi() {
      this.$store.commit(
        "setFullBranch",
        "Génie Electrique et Contrôle des Systèmes Industriels (GECSI)"
      );
      this.$store.commit("setDepartement","Département Génie Electrique");
      this.$store.commit("setBranch", "GECSI");
      this.$store.dispatch('upDateCondidacies');
      this.$store.commit("changeDrawer",this.drawer);
    },

    Logout() {
      axios.post("/api/logout").then((res) => {
        this.$router.push({ name: "index" });
        this.$store.commit("setUser", null);
      });
    },
  },
};
</script>

<style scoped>
.v-progress-circular {
  margin: 1rem;
}
</style>