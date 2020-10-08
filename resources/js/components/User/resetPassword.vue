<template>

<v-container class="mt-4">
   <v-layout row>
       <v-col class="col-12 col-sm-9 mx-auto">
          <v-stepper
    v-model="e6"
    vertical
  >
    <v-stepper-step
      :complete="e6 > 1"
      step="1"
    >
      <h4>Saisir votre E-mail</h4><br>
      <small>Afin que nous puissions envoyer un email de vérification</small>
    </v-stepper-step>

    <v-stepper-content step="1">
      <v-card
        border="none"
        class="mb-5"
        height="70px"
      >
        <v-text-field
            name="email"
            label="E-mail*"
            id="email"
            v-model="form.email"
            type="email"
            :error-messages="emailErrors"
            @input="$v.form.email.$touch()"
            @blur="$v.form.email.$touch()"
            class="mt-1 mb-0 mx-auto"
            outlined
            clearable

          ></v-text-field>
          <p class="red--text ">{{error}}</p>
      </v-card>
      <v-btn
        color="primary"
        @click.prevent="validationEmail"
        :loading="loading"
      >
        Continue
      </v-btn>
    </v-stepper-content>

    <v-stepper-step
      :complete="e6 > 2"
      step="2"
    >
    <h4> Changer mot de passe</h4>  <br>
      <small>Valider le code de vérification et entrer un nouveau mot de passe </small>
    </v-stepper-step>

    <v-stepper-content step="2">
      <v-card
        class="mb-4"
        height="250px"
      >
        <v-text-field
            v-model="form.token"
            label="Code de vérification"
            class="mt-1 mx-auto"
            outlined
            clearable
            :error-messages="tokenErrors"
            @input="$v.form.token.$touch()"
            @blur="$v.form.token.$touch()"
          ></v-text-field>
           <v-text-field
            v-model="form.password"
            label="Nouveau mot de passe"
            class="mt-1 mx-auto"
            type="password"
            outlined
            clearable
            :error-messages="passwordErrors"
            @input="$v.form.password.$touch()"
            @blur="$v.form.password.$touch()"
          ></v-text-field>
          <v-text-field
            v-model="form.confirmpassword"
            type="password"
            label="Confirmer mot de passe"
            class=" mx-auto"
            outlined
            clearable
            :error-messages="confirmpasswordErrors"
            @input="$v.form.confirmpassword.$touch()"
            @blur="$v.form.confirmpassword.$touch()"
          ></v-text-field>
      </v-card>
      <v-btn
        color="primary"
        @click="validationPassword"
        :loading="loading"
      >
       Changer mot de passe
      </v-btn>
    </v-stepper-content>

  </v-stepper>
       </v-col>
   </v-layout>

</v-container>

</template>


<script>
import {required, maxLength, minLength, email, withParams, sameAs} from "vuelidate/lib/validators";
  export default {
    data () {
      return {
        form:{
          email:'',
          token:'',
          password:'',
          confirmpassword:''
        },
        e6: 1,
        error:null,
        loading:false

      }
    },

   validations: {

        form:{

                   email: { required, email },
                   token:{ required },
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

}
    },


 computed: {

        emailErrors() {
            const errors = [];
            if (!this.$v.form.email.$dirty) return errors;
            !this.$v.form.email.email && errors.push("Doit être un e-mail valide");
            !this.$v.form.email.required && errors.push("E-mail est requis");
            return errors;
        },


        tokenErrors() {
            const errors = [];
            if (!this.$v.form.token.$dirty) return errors;
            !this.$v.form.token.required && errors.push("Le code de vérification est requis");
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


    },

    methods:{

      async  validationEmail(){

              this.$v.form.email.$touch()
             if(!this.$v.form.email.$invalid){

                  this.loading=true
                  const res = await this.callApi('post','/api/forgot',{email:this.form.email});
                   this.loading=false
                   if( res.status!= 400 && res.status!= 404){
                      this.e6=2
                  }else if(res.status===400){
                     this.e('il y a un probléme veuillez essayer plus tard !!');
                  }else if(res.status===404){
                       this.e('cet utilisateur n\'existe pas !!');
                  }


             }
        },

        async validationPassword(){

              this.$v.form.token.$touch()
              this.$v.form.password.$touch()
              this.$v.form.confirmpassword.$touch()

             if(!this.$v.form.token.$invalid && !this.$v.form.password.$invalid && !this.$v.form.confirmpassword.$invalid){
                 this.loading=true

                  const res = await this.callApi('post','/api/reset',{
                      token:this.form.token,
                      password:this.form.password,
                      confirmpassword:this.form.confirmpassword
                      });

                    console.log(res)

                   this.loading=false
                   if( res.status===200){
                       this.e6=3
                      this.$router.push({name:'SignInUser'})
                  }else if(res.status===400){
                      this.e('Le code de vérification invalide !!');
                  }else if(res.status===404){
                      this.error='cet utilisateur n\'existe pas'
                  }

             }
        },


    }





  }
</script>

<style lang="stylus" scoped>
.v-sheet.v-card:not(.v-sheet--outlined) {
    box-shadow: 0 0 0 0 ;
}
</style>
