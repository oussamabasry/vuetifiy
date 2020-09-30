<template>
    <v-container>
        <v-layout row>
            <v-flex xs12 sm8 offset-sm2>
              <v-hover v-slot:default="{ hover }" open-delay="200">
                <v-card :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                    <v-card-text>
                        <v-container>
                            <form @submit.prevent="onSignup">
                                <h1>Inscription</h1>
                                <v-container fluid>
                                    <v-row align="center">
                                        <v-col class="d-flex" cols="12" sm="6">
                                            <v-text-field
                                                name="firstname"
                                                label="Prénom"
                                                id="firstname"
                                                v-model="firstname"
                                                type="text"

                                                required
                                            ></v-text-field>
                                        </v-col>

                                        <v-col class="d-flex" cols="12" sm="6">
                                            <v-text-field
                                                name="lastname"
                                                label="Nom"
                                                id="lastname"
                                                v-model="lastname"
                                                type="text"

                                                required
                                            ></v-text-field>
                                        </v-col>

                                        <v-col class="d-flex" cols="12" sm="6">
                                            <v-text-field
                                                name="email"
                                                label="E-mail"
                                                id="email"
                                                v-model="email"
                                                type="email"

                                                required
                                            ></v-text-field>
                                        </v-col>

                                        <v-col class="d-flex" cols="12" sm="6">
                                            <v-text-field
                                                name="phonenumber"
                                                label="Téléphone"
                                                id="phonenumber"
                                                v-model="phonenumber"
                                                type="tel"

                                                required
                                            ></v-text-field>
                                        </v-col>

                                        <v-col class="d-flex" cols="12" sm="6">
                                            <v-select
                                                :items="items"
                                                label="Diplome"

                                                menu-props="left "
                                            ></v-select>
                                        </v-col>

                                        <v-col class="d-flex" cols="12" sm="6">
                                            <v-menu
                                                v-model="menu2"
                                                :close-on-content-click="false"
                                                :nudge-right="40"
                                                transition="scale-transition"
                                                offset-y
                                                min-width="290px"
                                            >
                                                <template
                                                    v-slot:activator="{
                                                        on,
                                                        attrs
                                                    }"
                                                >
                                                    <v-text-field
                                                        v-model="date"
                                                        label="Date de naissance"
                                                        readonly

                                                        v-bind="attrs"
                                                        v-on="on"
                                                    ></v-text-field>
                                                </template>
                                                <v-date-picker
                                                    v-model="date"
                                                    @input="menu2 = false"
                                                ></v-date-picker>
                                            </v-menu>
                                        </v-col>

                                        <v-col class="d-flex" cols="12" sm="6">
                                            <v-text-field
                                                name="password"
                                                label="Mot de passe"
                                                id="password"
                                                v-model="password"
                                                type="password"

                                                required
                                            ></v-text-field>
                                        </v-col>

                                        <v-col class="d-flex" cols="12" sm="6">
                                            <v-text-field
                                                name="confirmpassword"
                                                label="Confimer mot de passe"
                                                id="confirmpassword"
                                                v-model="confirmpassword"
                                                type="password"
                                                required
                                            ></v-text-field>
                                        </v-col>

                                         <v-col class="d-flex" cols="12" sm="6" >
                                             <v-btn class="mx-auto my-auto" type="submit" color="primary">S'inscrire</v-btn>
                                        </v-col>

                                        <v-col class="d-flex" cols="12" sm="6">
                                        <v-container>
                                            <p  class="mx-auto " style=" text-align: center;" >Si vous avez déja un compte, vous devez
                                          <router-link
                                          to="/sign-in-user"
                                          tag="span"
                                          style="cursor:pointer">
                                          <em style="color:blue;text-align:center">s'identifier</em>
                                          </router-link>
                                          </p>
                                        </v-container>

                                        </v-col>


                                    </v-row>
                                </v-container>





                            </form>
                        </v-container>
                    </v-card-text>
                </v-card>
                </v-hover>
            </v-flex>
        </v-layout>
        <foot></foot>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            firstname: "",
            lastname: "",
            email: "",
            phonenumber: "",
            password: "",
            confirmpassword: "",
            items: ["DEUG", "DEUST", "DEUP", "DUT", "BTS", "DTS"],
            date: new Date().toISOString().substr(0, 10),
            menu: false,
            modal: false,
            menu2: false,
        };
    },
    computed: {
        comparePasswords() {
            return this.password !== this.confirmPassword
                ? "Passwords do not match"
                : "";
        }
    },
    watch: {
        user(value) {
            if (value !== null && value !== undefined) {
                this.$router.push("/");
            }
        }
    },
    methods: {
        onSignup() {
            this.$store.dispatch("signUserUp", {
                email: this.email,
                password: this.password
            });
        }
    }
};
</script>

<style lang="sass" scoped>
.v-card.on-hover.theme--dark
  background-color: rgba(#FFF, 0.8)
  >.v-card__text
    color: #000
</style>
