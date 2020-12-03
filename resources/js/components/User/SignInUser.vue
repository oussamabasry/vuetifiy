<template>
  <div>
    <v-card
      width="700"
      class="rounded-lg mx-auto mt-lg-15 mt-xl-15 mt-md-15 mt-sm-15 mt-xs-0 mb-xs-0 pa-lg-15 pa-md-15 pa-sm-15 py-15"
      :elevation="!hover ? 16 : 16"
    >
      <v-card-title class="pb-10">
        <div class="mx-auto">Connectez-vous</div>
      </v-card-title>

      <v-card-text>
        <v-text-field
          label="E-mail*"
          v-model="form.email"
          type="email"
          :error-messages="emailErrors"
          @input="$v.form.email.$touch()"
          @blur="$v.form.email.$touch()"
          outlined
          class="ma-xs-0"
        ></v-text-field>

        <v-text-field
          label="Mot de passe*"
          type="password"
          v-model="form.password"
          :error-messages="passwordErrors"
          @input="$v.form.password.$touch()"
          @blur="$v.form.password.$touch()"
          outlined
          ma-xs-0
        ></v-text-field>
        <p class="red--text" v-if="invalidData">{{ error }}</p>
      </v-card-text>

      <v-card-actions>
        <v-btn
          color="pink"
          width="40%"
          dark
          rounded
          class="mx-auto py-6"
          :loading="loading"
          @click.prevent="signin"
          >Connexion</v-btn
        >
      </v-card-actions>
      <v-row>
        <v-col class="colroute">
          <router-link
            class="route"
            v-if="confirmemail == false"
            to="/reset-password"
          >
            Mot de passe oublié?
          </router-link>

          <router-link class="route" v-else to="/confirm-email">
            confirmer votre email?</router-link
          >
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      hover: false,
      showPassword: false,
      invalidData: false,
      error: "",
      loading: false,
      confirmemail: false,
    };
  },

  validations: {
    form: {
      email: { required, email },
      password: { required },
    },
  },

  computed: {
    emailErrors() {
      const errors = [];
      if (!this.$v.form.email.$dirty) return errors;
      !this.$v.form.email.email && errors.push("Enter un e-mail valide");
      !this.$v.form.email.required && errors.push("E-mail est requis");
      return errors;
    },
    passwordErrors() {
      const errors = [];
      if (!this.$v.form.password.$dirty) return errors;
      !this.$v.form.password.required &&
        errors.push("Le mot de passe est requis");
      return errors;
    },
  },
  methods: {
    async signin() {
      this.$v.$touch();
      if (!this.$v.$invalid) {
        this.loading = true;
        
        const res = await this.callApi("post", "/api/login", this.form);
        const userData = await this.callApi("post", "/api/me");
        console.log(userData);
        this.loading = false;
        if (res.status == 200) {
          const {data}=userData;
          this.$store.commit("setUser", res.data); // res.data = data
          if (data.role === "admin") this.$router.push({ name: "condidacies" });
          else this.$router.push({ name: "dashUser" });
          
          this.$v.$reset();
          this.email = "";
          this.password = "";

          localStorage.setItem("token",res.data.access_token)
        }
          else if (res.status == 403) {
          this.invalidData = true;
          this.confirmemail = true;
          this.error = "Vous devez confirmer votre email";
          this.$router.push({ name: "confirmemail" });
        } else {
          this.invalidData = true;
          this.error = "Email ou mot de passe incorrect !";
          this.confirmemail = false;
          this.e("La connexion a été échoue !!");
        }
      }
    },
  },
};
</script>

<style scoped>
.colroute {
  text-align: end;
}

.route {
  color: #2e4053;
  margin-right: 20px;
}

.route:hover {
  color: #e71061;
}
</style>
