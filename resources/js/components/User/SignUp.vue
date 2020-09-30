<template>
    <v-container>
        <v-layout row>
            <v-flex xs12 sm8 offset-sm2>
                <v-hover v-slot:default="{ hover }" open-delay="200">
                    <v-card
                        :elevation="hover ? 16 : 2"
                        :class="{ 'on-hover': hover }"
                    >
                        <v-card-text class="mt-7">
                            <v-container>
                                <form @submit.prevent="onSignup">
                                    <h1>Inscription</h1>
                                    <v-container fluid>
                                        <v-row align="center">
                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="firstname"
                                                    label="Prénom"
                                                    id="firstname"
                                                    v-model="firstname"
                                                    type="text"
                                                    :error-messages="
                                                        firstnameErrors
                                                    "
                                                    @input="
                                                        $v.firstname.$touch()
                                                    "
                                                    @blur="
                                                        $v.firstname.$touch()
                                                    "
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="lastname"
                                                    label="Nom"
                                                    id="lastname"
                                                    v-model="lastname"
                                                    type="text"
                                                    :error-messages="
                                                        lastnameErrors
                                                    "
                                                    @input="
                                                        $v.lastname.$touch()
                                                    "
                                                    @blur="$v.lastname.$touch()"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="email"
                                                    label="E-mail"
                                                    id="email"
                                                    v-model="email"
                                                    type="email"
                                                    :error-messages="
                                                        emailErrors
                                                    "
                                                    @input="$v.email.$touch()"
                                                    @blur="$v.email.$touch()"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="phonenumber"
                                                    label="Téléphone"
                                                    id="phonenumber"
                                                    v-model="phonenumber"
                                                    type="tel"
                                                    :error-messages="
                                                        phonenumberErrors
                                                    "
                                                    @input="
                                                        $v.phonenumber.$touch()
                                                    "
                                                    @blur="
                                                        $v.phonenumber.$touch()
                                                    "
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-select
                                                    :items="items"
                                                    label="Diplome"
                                                    menu-props="left "
                                                    v-model="diplome"
                                                    :error-messages="diplomeErrors"
                                                    @input="$v.diplome.$touch()"
                                                    @blur="$v.diplome.$touch()"
                                                ></v-select>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-menu
                                                    ref="menu"
                                                    v-model="menu"
                                                    :close-on-content-click="
                                                        false
                                                    "
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
                                                            v-model="datebirth"
                                                            label="Date de naissance"
                                                            :error-messages="datebirthErrors"
                                                            @input=" $v.datebirth.$touch()"
                                                            @blur=" $v.datebirth.$touch()"
                                                            readonly
                                                            v-bind="attrs"
                                                            v-on="on"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker
                                                        ref="picker"
                                                        v-model="datebirth"
                                                        max="2005-01-01"
                                                        min="1990-01-01"
                                                       
                                                    ></v-date-picker>
                                                </v-menu>


                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="password"
                                                    label="Mot de passe"
                                                    type="password"
                                                    id="password"
                                                    v-model="password"
                                                    :error-messages="passwordErrors"
                                                    @input="$v.password.$touch()"
                                                    @blur="$v.password.$touch()"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="confirmpassword"
                                                    label="Confimer mot de passe"
                                                    id="confirmpassword"
                                                    type="password"
                                                    v-model="confirmpassword"
                                                    :error-messages="confirmpasswordErrors"
                                                    @input="$v.confirmpassword.$touch()"
                                                    @blur="$v.confirmpassword.$touch()"
                                                    required

                                                ></v-text-field>
                                            </v-col>
                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="12"
                                            >
                                                <v-radio-group
                                                    v-model="sexe"
                                                    :error-messages="sexeErrors"
                                                    @input="$v.sexe.$touch()"
                                                    @blur="$v.sexe.$touch()"
                                                    row
                                                >
                                                    <v-radio
                                                        label="Femme"
                                                        value="Femme"
                                                        name="sexe"
                                                        color="indigo darken-3"
                                                        mandatory
                                                    ></v-radio>
                                                    <v-radio
                                                        label="Homme"
                                                        value="Homme"
                                                        name="sexe"
                                                        color="indigo darken-3"
                                                    ></v-radio>
                                                </v-radio-group>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-btn
                                                    class=""
                                                    type="submit"
                                                    color="primary"
                                                    >S'inscrire</v-btn
                                                >
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-container>
                                                    <p
                                                        class="mx-auto "
                                                        style=" text-align: center;"
                                                    >
                                                        Si vous avez déja un
                                                        compte, vous devez
                                                        <router-link
                                                            to="/sign-in-user"
                                                            tag="span"
                                                            style="cursor:pointer"
                                                        >
                                                            <em
                                                                style="color:blue;text-align:center"
                                                                >s'identifier</em
                                                            >
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
import {
    required,
    maxLength,
    minLength,
    email,
    maxValue,
    withParams,
    sameAs
} from "vuelidate/lib/validators";
const isPhone = value => /^\+?[0-9]+$/.test(value); //phone valid
export default {
    data() {
        return {
            firstname: "",
            lastname: "",
            email: "",
            phonenumber: "",
            diplome: "",
            datebirth: "",
            password: "",
            confirmpassword: "",
            sexe: "Femme",
            items: ["DEUG", "DEUST", "DEUP", "DUT", "BTS", "DTS"],
            date: new Date().toISOString().substr(0, 10),
            menu: false,
            modal: false,

        };
    },

    validations: {
        firstname: {
            required,
            maxLength: maxLength(20),
            minLength: minLength(3)
        },
        lastname: {
            required,
            maxLength: maxLength(20),
            minLength: minLength(3)
        },
        email: { required, email },
        phonenumber: {
            required,
            maxLength: maxLength(15),
            minLength: minLength(10),
            phoneValid: isPhone
        },
        diplome: { required },
        datebirth: { required },
        password: {
             required,
              minLength: minLength(8),  // I assume you'd want something like this too
             containsUppercase: function(value) {
               return /[A-Z]/.test(value)
             },
             containsLowercase: function(value) {
               return /[a-z]/.test(value)
             },
             containsNumber: function(value) {
               return /[0-9]/.test(value)
             },
             containsSpecial: function(value) {
               return /[#?!@$%^&*-]/.test(value)
             }
         },

    confirmpassword:{
        required,
        sameAsPassword: sameAs('password')
    },

    sexe:{
        required,
    }

    },

    computed: {
        firstnameErrors() {
            const errors = [];
            if (!this.$v.firstname.$dirty) return errors;
            !this.$v.firstname.maxLength &&
                errors.push("Le prénom doit comporter au plus 20 caractères");
            !this.$v.firstname.minLength &&
                errors.push("Le prénom doit comporter au moins 3 caractères");
            !this.$v.firstname.required && errors.push("Le prénom est requis.");
            return errors;
        },

        lastnameErrors() {
            const errors = [];
            if (!this.$v.lastname.$dirty) return errors;
            !this.$v.lastname.maxLength &&
                errors.push("Le nom doit comporter au plus 20 caractères");
            !this.$v.lastname.minLength &&
                errors.push("Le nom doit comporter au moins 3 caractères");
            !this.$v.lastname.required && errors.push("Le nom est requis");
            return errors;
        },

        emailErrors() {
            const errors = [];
            if (!this.$v.email.$dirty) return errors;
            !this.$v.email.email && errors.push("Doit être un e-mail valide");
            !this.$v.email.required && errors.push("E-mail est requis");
            return errors;
        },

        phonenumberErrors() {
            const errors = [];
            if (!this.$v.phonenumber.$dirty) return errors;
            !this.$v.phonenumber.maxLength &&
                errors.push("Numéro de téléphone invalide");
            !this.$v.phonenumber.minLength &&
                errors.push("Numéro de téléphone invalide");
            !this.$v.phonenumber.required &&
                errors.push("Numéro de téléphone est requis");
            !this.$v.phonenumber.phoneValid &&
                errors.push("Numéro de téléphone invalide");
            return errors;
        },

        diplomeErrors() {
            const errors = [];
            if (!this.$v.diplome.$dirty) return errors;
            !this.$v.diplome.required && errors.push("Le diplome est requis");
            return errors;
        },

        datebirthErrors() {
            const errors = [];
            if (!this.$v.datebirth.$dirty) return errors;
            !this.$v.datebirth.required && errors.push("La date de naissance est requis");
            return errors;
        },
      passwordErrors() {
            const errors = [];
            if (!this.$v.password.$dirty) return errors;
            !this.$v.password.minLength && errors.push("Le mot de passe doit comporter au moins 8 caractères");
            !this.$v.password.required && errors.push("Le mot de passe est requis");
            !this.$v.password.containsUppercase && errors.push("Mot de passe saisie trop faible ! (exemple: RH3@e9rt#A$)");
            !this.$v.password.containsLowercase && errors.push("Mot de passe saisie trop faible ! (exemple: RH3@e9rt#A$)");
            !this.$v.password.containsNumber && errors.push("Mot de passe saisie trop faible ! (exemple: RH3@e9rt#A$)");
            !this.$v.password.containsSpecial && errors.push("Mot de passe saisie trop faible ! (exemple: RH3@e9rt#A$)");
            return errors;
        },

        confirmpasswordErrors(){
           const errors = [];
            if (!this.$v.confirmpassword.$dirty) return errors;
            !this.$v.confirmpassword.required && errors.push("La confirmation du mot de passe est requis");
            !this.$v.confirmpassword.sameAsPassword && errors.push("Les mots de passe doivent être identiques");
            return errors;
        },

        sexeErrors(){
             const errors = [];
            if (!this.$v.sexe.$dirty) return errors;
            !this.$v.sexe.required && errors.push("Le sexe est requis");
            return errors;
        }


    },

    methods: {
        onSignup() {
            this.$store.dispatch("signUserUp", {
                email: this.email,
                password: this.password
            });
        },


    },

     watch: {
      menu (val) {
        val && setTimeout(() => (this.$refs.picker.activePicker = 'YEAR'))
      },
    },
};
</script>

<style lang="sass" scoped>
.v-card.on-hover.theme--dark
  background-color: rgba(#FFF, 0.8)
  >.v-card__text
    color: #000

</style>

<style scoped>
.height {
    max-height: 70px;
}

</style>
