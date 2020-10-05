<template>
    <div>
     <h1 v-if="getUser!=null">{{getUser.firstname}}  {{getUser.lastname}}</h1>
     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <foot/>
    </div>
</template>

<script>
export default {
    data(){
        return {
          user:null
        }
    },

computed:{
    getUser(){
        return this.$store.getters.user
    }
}




}
</script>
