<template>
    <div>
    <h1>Dadhboard User</h1><br>
     <h3 v-if="getUser!=null">{{getUser.firstname}}  {{getUser.lastname}}</h3>
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
