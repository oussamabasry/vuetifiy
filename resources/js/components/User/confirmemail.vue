<template>

<v-container class="mt-4">
<v-layout row>
<v-col class="col-12 col-sm-9 mx-auto">
<h1 class="blue--text">Confirmation du compte</h1>
</v-col>
</v-layout>
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
    <h4> Valider le code véfication</h4>  <br>
      <small>Vous trouverez ce code dans votre bôte e-mail </small>
    </v-stepper-step>

    <v-stepper-content step="2">
      <v-card
        class="mb-4"
        height="80px"
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
      </v-card>
      <v-btn
        color="primary"
        @click="validationPassword"
        :loading="loading"
      >
       Confirmé votre email
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


    },

    methods:{

      async  validationEmail(){

              this.$v.form.email.$touch()
             if(!this.$v.form.email.$invalid){

                  this.loading=true
                  const res = await this.callApi('post','/api/send-email-confirm',{email:this.form.email});
                   this.loading=false
                   if( res.status!= 400 && res.status!= 404 && res.status!= 406 ){
                      this.e6=2
                  }else if(res.status===400){
                     this.e('il y a un probléme veuillez essayer plus tard !!');
                  }else if(res.status===404){
                       this.e('cet utilisateur n\'existe pas !!');
                  }else if(res.status===406){
                       this.e('Ce compte est déja confirmé');
                  }


             }
        },

        async validationPassword(){

              this.$v.form.token.$touch()
             if(!this.$v.form.token.$invalid){
                 this.loading=true

                  const res = await this.callApi('post','/api/confirm-email',{token:this.form.token});

                    console.log(res)

                   this.loading=false
                   if( res.status===200){
                       this.e6=3
                      this.$router.push({name:'SignInUser'})
                      this.s('Vous avez confirmer votre email avec succes');
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
