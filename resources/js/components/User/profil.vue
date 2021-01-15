<template>
    <v-app>
        
      
     <v-parallax src="https://convertingcolors.com/gradient-42A5F5.svg" height="100%">
  
    <v-icon right size="100">mdi-account-tie</v-icon>
    
    <p class="b"> Bienvenue dans votre profil          </p>
      <v-row justify="center">
     
    
  </v-row>
   
    
  
  <v-simple-table height="350" class="t" >
    <template v-slot:default v-if="condidacies[0]" >
      
      <tbody  >
        <tr
        class="text-center"
         
        >
          <td class="t"> <strong>{{ desserts[0].name }}</strong></td>
          <td>{{ condidacies[0].lastname }}</td>
        </tr>
      </tbody>
       <tbody  >
        <tr
        class="text-center"
         
        >
          <td class="t"> <strong>{{ desserts[1].name }}</strong></td>
          <td>{{ condidacies[0].firstname }}</td>
        </tr>
      </tbody>
       <tbody  >
        <tr
        class="text-center"
         
        >
          <td class="t"> <strong>{{ desserts[2].name}}</strong></td>
          <td>{{ condidacies[0].phonenumber }}</td>
        </tr>
      </tbody>
      <tbody  >
        <tr
        class="text-center"
         
        >
          <td class="t"> <strong>{{ desserts[3].name}}</strong></td>
          <td>{{ condidacies[0].CNE }}</td>
        </tr>
      </tbody>
      <tbody  >
        <tr
        class="text-center"
         
        >
          <td class="t"> <strong>{{ desserts[4].name}}</strong></td>
          <td>{{ condidacies[0].sexe }}</td>
        </tr>
      </tbody>
      <tbody  >
        <tr
        class="text-center"
         
        >
          <td class="t"> <strong>{{ desserts[5].name}}</strong></td>
          <td>{{ condidacies[0].CNI}}</td>
        </tr>
      </tbody>
     <tbody  >
        <tr
        class="text-center"
         
        >
          <td class="t"> <strong>{{ desserts[6].name}}</strong></td>
          <td>{{ condidacies[0].datebirth }}</td>
        </tr>
      </tbody>
      
    </template>
    
  </v-simple-table>

  
  </v-parallax>
 
    </v-app>
    
</template>


<style scoped>
.b{
    font-size: 3em;
    text-shadow: 2px 5px 2px darkblue;
    text-indent:  525px;
    margin-top: -11px;
    
    
}
.f{
  margin-bottom: 7px;

 
}
.z{
  font-size: 17px;
 
}
.t{
  margin-left: 20%;
  margin-right: 20%;
  margin-bottom: 30px;
  
  
}

</style>

<script>
  export default {
    data () {
      return {
          icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
            links: [
        'Home',
        'About Us',
        'Team',
        'Services',
        'Blog',
        'Contact Us',
      ],
        name:"fafa",
        desserts: [
          {
            name: 'Nom   :',
            calories: "eee",
          },
          {
            name: 'Prenom',
            calories:"moaad",
          },
          
          {
            name: 'Numéro de telephone',
            calories: "0609985678",
          },
          {
            name: 'CNE',
            calories: 'moadlzrak@gmail.com',
          },
          {
            name: 'Sexe',
            calories: "Homme",
          },
          {
            name: "CNI",
            calories: " temara hay wifaq immeuble 15",
          },
          {
            name: 'Date de naissanca',
            calories: "29/06/1999",
          },
           
        ],
       condidacies : {},
        dialog: false,
        notifications: false,
        sound: true,
        widgets: false,
        tele:'',
      
      }
      
    },
    
    created(){
         axios.get('/api/condidat')
  
  .then(response => {
    this.condidacies= response.data;
    console.log(response.data);
  })
  .catch(error => console.log(error))
       
    },
    

  }
</script>