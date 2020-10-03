<template>
    <div>
     <h1 v-if="user!=null">{{user.firstname}}  {{user.lastname}}</h1>
     <h1 v-else> vide </h1>
     <v-btn color="primary" @click.prevent="Logout"> Logout</v-btn>
    </div>
</template>

<script>
export default {
    data(){
        return {
          user:null
        }
    },

    methods:{
        Logout(){
             axios.post('/api/logout').then((res)=>{
                 this.$router.push({name:'SignInUser'})
             })
        }
    },


     mounted(){
          axios.get('/api/user').then((res)=>{
              this.user=res.data
          })
    }
}
</script>
