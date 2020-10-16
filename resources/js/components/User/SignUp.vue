<template>
    <v-container>
        <v-layout row>
            <v-flex xs12 sm8 offset-sm2>
                <v-hover v-slot:default="{ hover }" open-delay="200">
                    <v-card
                        :elevation="!hover ? 16 :16"
                        :class="{ 'on-hover': hover }"
                    >
                        <v-card-text class="mt-xl-7 mt-lg-7 mt-md-7 mt-sm-7 mt-xs-0">
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
                                                    label="Prénom*"
                                                    id="firstname"
                                                    v-model="form.firstname"
                                                    type="text"
                                                    :error-messages="
                                                        firstnameErrors
                                                    "
                                                    @input="
                                                        $v.form.firstname.$touch()
                                                    "
                                                    @blur="
                                                        $v.form.firstname.$touch()
                                                    "

                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="lastname"
                                                    label="Nom*"
                                                    id="lastname"
                                                    v-model="form.lastname"
                                                    type="text"
                                                    :error-messages="
                                                        lastnameErrors
                                                    "
                                                    @input="
                                                        $v.form.lastname.$touch()
                                                    "
                                                    @blur="$v.form.lastname.$touch()"

                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="email"
                                                    label="E-mail*"
                                                    id="email"
                                                    v-model="form.email"
                                                    type="email"
                                                    :error-messages="
                                                        emailErrors
                                                    "
                                                    @input="$v.form.email.$touch()"
                                                    @blur="$v.form.email.$touch()"

                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="phonenumber"
                                                    label="Téléphone*"
                                                    id="phonenumber"
                                                    v-model="form.phonenumber"
                                                    type="tel"
                                                    :error-messages="
                                                        phonenumberErrors
                                                    "
                                                    @input="
                                                        $v.form.phonenumber.$touch()
                                                    "
                                                    @blur="
                                                        $v.form.phonenumber.$touch()
                                                    "

                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                              <v-text-field
                                                    name="cne"
                                                    label="CNE*"
                                                    id="cne"
                                                    v-model="form.CNE"
                                                    type="text"
                                                    :error-messages="CNEErrors"
                                                    @input="$v.form.CNE.$touch()"
                                                    @blur="$v.form.CNE.$touch()"

                                                ></v-text-field>

                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-menu
                                                    ref="menu"
                                                    v-model="menu"
                                                    :close-on-content-click="false"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="290px"
                                                >
                                                    <template v-slot:activator="{on,attrs}">
                                                        <v-text-field
                                                            v-model="form.datebirth"
                                                            label="Date de naissance*"
                                                            :error-messages="datebirthErrors"
                                                            @input=" $v.form.datebirth.$touch()"
                                                            @blur=" $v.form.datebirth.$touch()"
                                                            readonly
                                                            v-bind="attrs"
                                                            v-on="on"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker
                                                        ref="picker"
                                                        v-model="form.datebirth"
                                                        max="2005-01-01"
                                                        min="1990-01-01"
                                                        @change="save"
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
                                                    label="Mot de passe*"
                                                    type="password"
                                                    id="password"
                                                    v-model="form.password"
                                                    :error-messages="passwordErrors"
                                                    @input="$v.form.password.$touch()"
                                                    @blur="$v.form.password.$touch()"

                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="6"
                                            >
                                                <v-text-field
                                                    name="confirmpassword"
                                                    label="Confimer mot de passe*"
                                                    id="confirmpassword"
                                                    type="password"
                                                    v-model="form.confirmpassword"
                                                    :error-messages="confirmpasswordErrors"
                                                    @input="$v.form.confirmpassword.$touch()"
                                                    @blur="$v.form.confirmpassword.$touch()"


                                                ></v-text-field>
                                            </v-col>
                                            <v-col
                                                class="d-flex height"
                                                cols="12"
                                                sm="12"
                                            >
                                                <v-radio-group
                                                    v-model="form.sexe"
                                                    :error-messages="sexeErrors"
                                                    @input="$v.form.sexe.$touch()"
                                                    @blur="$v.form.sexe.$touch()"
                                                    row
                                                >
                                                    <v-radio
                                                        label="Femme"
                                                        value="Femme"
                                                        name="sexe"
                                                        color="black"
                                                        mandatory
                                                    ></v-radio>
                                                    <v-radio
                                                        label="Homme"
                                                        value="Homme"
                                                        name="sexe"
                                                        color="black"
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
                                                    color="pink"
                                                    dark

                                                    :loading="loading"
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
                                                            class="auth"
                                                        >
                                                       <em> s'authentifier</em>
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

           form:{
                   firstname: '',
                   lastname: '',
                   email: '',
                   phonenumber:'',
                   CNE: '',
                   datebirth: '',
                   password: '',
                   confirmpassword: '',
                   sexe: "Femme",
                   role:'user',
            },

            date: new Date().toISOString().substr(0, 10),
            menu: false,
            modal: false,
            loading: false,


        };
    },

    validations: {

        form:{
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
                   CNE: { required },
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
}
    },

    computed: {
        firstnameErrors() {
            const errors = [];
            if (!this.$v.form.firstname.$dirty) return errors;
            !this.$v.form.firstname.maxLength &&
                errors.push("Le prénom doit comporter au plus 20 caractères");
            !this.$v.form.firstname.minLength &&
                errors.push("Le prénom doit comporter au moins 3 caractères");
            !this.$v.form.firstname.required && errors.push("Le prénom est requis.");
            return errors;
        },

        lastnameErrors() {
            const errors = [];
            if (!this.$v.form.lastname.$dirty) return errors;
            !this.$v.form.lastname.maxLength &&
                errors.push("Le nom doit comporter au plus 20 caractères");
            !this.$v.form.lastname.minLength &&
                errors.push("Le nom doit comporter au moins 3 caractères");
            !this.$v.form.lastname.required && errors.push("Le nom est requis");
            return errors;
        },

        emailErrors() {
            const errors = [];
            if (!this.$v.form.email.$dirty) return errors;
            !this.$v.form.email.email && errors.push("Doit être un e-mail valide");
            !this.$v.form.email.required && errors.push("E-mail est requis");
            return errors;
        },

        phonenumberErrors() {
            const errors = [];
            if (!this.$v.form.phonenumber.$dirty) return errors;
            !this.$v.form.phonenumber.maxLength &&
                errors.push("Numéro de téléphone invalide");
            !this.$v.form.phonenumber.minLength &&
                errors.push("Numéro de téléphone invalide");
            !this.$v.form.phonenumber.required &&
                errors.push("Numéro de téléphone est requis");
            !this.$v.form.phonenumber.phoneValid &&
                errors.push("Numéro de téléphone invalide");
            return errors;
        },

        CNEErrors() {
            const errors = [];
            if (!this.$v.form.CNE.$dirty) return errors;
            !this.$v.form.CNE.required && errors.push("Le diplome est requis");
            return errors;
        },

        datebirthErrors() {
            const errors = [];
            if (!this.$v.form.datebirth.$dirty) return errors;
            !this.$v.form.datebirth.required && errors.push("La date de naissance est requis");
            return errors;
        },
      passwordErrors() {
            const errors = [];
            if (!this.$v.form.password.$dirty) return errors;
            !this.$v.form.password.minLength && errors.push("Le mot de passe doit comporter au moins 8 caractères");
            !this.$v.form.password.required && errors.push("Le mot de passe est requis");
            !this.$v.form.password.containsUppercase && errors.push("Mot de passe saisie trop faible ! (exemple: RH3@e9rt#A$)");
            !this.$v.form.password.containsLowercase && errors.push("Mot de passe saisie trop faible ! (exemple: RH3@e9rt#A$)");
            !this.$v.form.password.containsNumber && errors.push("Mot de passe saisie trop faible ! (exemple: RH3@e9rt#A$)");
            !this.$v.form.password.containsSpecial && errors.push("Mot de passe saisie trop faible ! (exemple: RH3@e9rt#A$)");
            return errors;
        },

        confirmpasswordErrors(){
           const errors = [];
            if (!this.$v.form.confirmpassword.$dirty) return errors;
            !this.$v.form.confirmpassword.required && errors.push("La confirmation du mot de passe est requis");
            !this.$v.form.confirmpassword.sameAsPassword && errors.push("Les mots de passe doivent être identiques");
            return errors;
        },

        sexeErrors(){
             const errors = [];
            if (!this.$v.form.sexe.$dirty) return errors;
            !this.$v.form.sexe.required && errors.push("Le sexe est requis");
            return errors;
        }


    },

    methods: {
        save (date) {
        this.$refs.menu.save(date)
      },



      async  onSignup() {

              this.$v.$touch()
              if (!this.$v.$invalid) {
                     this.loading = true
                     const res = await this.callApi('post','/api/register',this.form);
                     this.loading = false
                     if(res.status==201){
                        this.s('vous vous êtes inscrits avec succès')
                         this.$router.push({name:'confirmemail'})
                     }else{
                         this.submitStatus = 'ERROR API AXIOS'
                         this.w('Il y a  déja un compte enregistré avec cet e-mail veuillez s\'authentifier s\'il vous plait !!')
                         return
                    }

              }
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

.auth{
    color:#2E4053;
}
.auth:hover{
    color:#E71061;
}

</style>
