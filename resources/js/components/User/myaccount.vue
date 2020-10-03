<template>
    <div>
     <h1 v-if="user!=null">{{user.firstname}}  {{user.lastname}}</h1>

    </div>
</template>

<script>
export default {
    data(){
        return {
          user:null
        }
    },



     mounted(){
          axios.get('/api/user').then((res)=>{
              this.user=res.data
          })
    }
}
</script>
