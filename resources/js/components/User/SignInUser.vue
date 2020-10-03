<template>
    <div>
         <v-card width="550" class="mx-auto mt-15">
        <v-card-title>Connexion Candidat</v-card-title>
        <v-card-text>
          <v-text-field
          label="E-mail"
          prepend-icon="mdi-account-circle"
          v-model="form.email"
          type="email"
          :error-messages="emailErrors"
          @input="$v.form.email.$touch()"
          @blur="$v.form.email.$touch()"
          />
          <v-text-field
          label="Mot de passe"
          :type="showPassword ? 'text' : 'password'"
          prepend-icon="mdi-lock"
          :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="showPassword = !showPassword"
          v-model="form.password"
          :error-messages="passwordErrors"
          @input="$v.form.password.$touch()"
          @blur="$v.form.password.$touch()"/>
          <p class="red--text" v-if="invalidData"> Email ou mot de passe incorrect !</p>
        </v-card-text>

        <v-divider></v-divider>
        <v-card-actions>
          <v-btn color="info"
          width="50%"
          class="mx-auto"
          :loading="loading"
          @click.prevent="signin">Connexion</v-btn>
        </v-card-actions>
      </v-card>
    </div>
</template>

<script>
import {required, email} from "vuelidate/lib/validators";
export default {
data(){
    return {

        form:{
            email:'',
            password:'',
        },

        showPassword:false,
        invalidData:false,
        loading: false,
    }
},

validations:{
     form:{
         email: { required, email },
         password:{required}
     }
},

computed:{
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
            !this.$v.form.password.required && errors.push("Le mot de passe est requis");
            return errors;
        },
},
methods:{
   async signin(){


          this.$v.$touch()
           if (!this.$v.$invalid) {
               this.loading=true;
               const res = await this.callApi(
                           'post',
                           '/api/sign-in-user',
                           this.form
                           );
                this.loading=false
                if(res.status==200){

                             this.s('vous vous êtes connecté avec succès')
                             this.$router.push({name:"myaccount"});
                             this.$v.$reset()
                             this.email=''
                             this.password=''
                          }else{
                              this.invalidData=true
                              this.w('La connexion a été échoue !!');
                         }


    }
}
}
}

</script>

<style scoped>

</style>
