<template>
  
  <v-app>
  <v-parallax
    height="800"
    src="https://fondosmil.com/fondo/9849.jpg"
  >
       <p class="p"> <strong> Veuillez remplir le formulaire ci-dessus </strong></p> <br/>  <p class="y"> <strong>afin d'accéder aux fillières d'ingénieurs de l'ENSET-M</strong></p>
       
  <div class="r">
<div class="col-sm-10 bg-dark ">
    <div class="card  ">
      <div class="card-body ">
        
        <form   enctype="multipart/form-data"
     >
  <div class="form-row">
    <div class="form-group col-md-3 mb-3">
      <label for="inputEmail4" aria-required="1"> <strong class="z">CNE</strong> </label>
      <input type="CNE" class="form-control "  placeholder="CNE" required v-model="form.CNE"  
       >
       <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="inputPassword4"><strong class="z">CNI</strong></label>
      <input type="CNI" class="form-control" v-model="form.CNI" placeholder="CNI"  required>
    </div>
 
    <div class="form-group col-md-3 mb-3">
      <label for="inputEmail4"> <strong class="z">Note S1</strong> </label>
      <input  class="form-control" v-model="form.note_S1" placeholder="Note S1" required>
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="inputPassword4"><strong class="z">Note S2</strong></label>
      <input  class="form-control"  v-model="form.note_S2" placeholder="Note S2" required>
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-3 mb-3">
      <label for="inputEmail4"> <strong class="z">Note S3</strong> </label>
      <input  class="form-control" v-model="form.note_S3" placeholder="Note S3" required>
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="inputPassword4"><strong class="z">Note S4</strong></label>
      <input  class="form-control" v-model="form.note_S4" placeholder="Note S4" required>
    </div>
 
    
    <div class="form-group col-md-3 mb-3">
      <label for="inputPassword4"><strong class="z">année_obtention_bac</strong></label>
      <input  class="form-control"  v-model="form.annee_bac" placeholder="Ex: 2017" required>
    </div>
     <div class="form-group col-md-3 mb-3">
      <label for="inputEmail4"> <strong class="z">année_obtention_bac+2</strong> </label>
      <input  class="form-control" v-model="form.annee_bac2" placeholder="Ex: 2017" required>
    </div>
  </div>
  <div class="form-group ">
      <label for="inputEmail4"> <strong class="z">filière</strong> </label>
      <input  class="form-control" v-model="form.filliere"  placeholder="filière" required>
    </div>
   <div class="form-row">
    
    <div class="input-group col-md-3 mb-3">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" @change="R1" >
    <label class="custom-file-label" for="inputGroupFile01"> <strong>Relevet_S1</strong> </label>
  </div>
</div>
    <div class="input-group col-md-3 mb-3">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" @change="R2" >
    <label class="custom-file-label" for="inputGroupFile01"> <strong>Relevet_S2</strong> </label>
  </div>
</div>
    <div class="input-group col-md-3 mb-3">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" @change="R3" >
    <label class="custom-file-label" for="inputGroupFile01"> <strong>Relevet_S3</strong> </label>
  </div>
</div>
<div class="input-group col-md-3 mb-3">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" @change="R4" >
    <label class="custom-file-label" for="inputGroupFile01"> <strong>Relevet_S4</strong> </label>
  </div>
</div>
  </div>
   <div class="form-row">
    
    <div class="input-group col-md-4 mb-3">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input" id="selectfile"
      aria-describedby="inputGroupFileAddon01" @change="selectFile" >
    <label class="custom-file-label" for="inputGroupFile01"> <strong>CV</strong> </label>
  </div>
</div>
 
    <div class="input-group col-md-4 mb-3">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" @change="Dp" >
    <label class="custom-file-label" for="inputGroupFile01"> <strong>Diplome_file</strong> </label>
  </div>
</div>
    <div class="input-group col-md-4 mb-3">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" @change="Pic">
    <label class="custom-file-label" for="inputGroupFile01"> <strong>Photo</strong> </label>
  </div>
</div>
  </div>
   <div class="form-row">
  <div class="input-group col-md-6">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input " id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" @change="Cnir"  >
    <label class="custom-file-label" for="inputGroupFile01"> <strong>CNI_Recto</strong> </label>
  </div>
</div>
<div class="input-group col-md-6 ">
  
  <div class="custom-file">
    
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" @change="Cniv" >
    <label class="custom-file-label" for="inputGroupFile01"> <strong>CNI_Verso</strong> </label>
  </div>
</div>
  </div>
  
  <button type="submit"  @click.prevent="addtask" class="btn btn-primary btn-lg"><router-link to="/filliere" tag="span">Valider</router-link> </button>
</form>
      </div>
    </div>
  </div>
  </div>
  </v-parallax>
   
    <v-card
      flat
      tile
      class="brown lighten-5  black--text text-center foot"
    >
      <v-card-text>
        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-4 black--text"
          icon
        >
          <v-icon size="24px">
            {{ icon }}
          </v-icon>
        </v-btn>
      </v-card-text>

      <v-card-text class="black--text pt-0 ">
        <v-row
      justify="center"
      no-gutters
    >
      <v-btn
        v-for="link in links"
        :key="link"
        color="black"
        text
        rounded
        class="my-2"
      >
        {{ link }}
      </v-btn>
      </v-row>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="black--text">
        {{ new Date().getFullYear() }} — <strong>ENSET Concours</strong>
      </v-card-text>
    </v-card>
  
  
    </v-app>
</template>



<style scoped>
.p{
  color: black;
  font-size: 31px;
  text-indent: 470px;
  text-shadow: 2px 5px 2px rgb(202, 207, 226);
  margin-top: -39px;
}
.y{
  color: black;
  font-size: 31px;
  text-indent: 360px;
  text-shadow: 2px 5px 2px rgb(202, 207, 226);
  margin-top: -29px;
}
.i{
  color: black;

}
.z{
  color: black;

}
.r{
  margin-right: -4em;
  margin-left: 15em;

}
</style>>

<script>
  export default {
    data: () => ({
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
      photo:null,
    pic:null,
    cnir:null,
    cniv:null,
    r1:null,
    r2:null,
    r3:null,
    r4:null,
    dp:null,
      form : {
          CNE:'',
    CNI:'',
    note_S1:'',
    note_S2:'',
    note_S3:'',
    note_S4:'',
    filliere:'',
    annee_bac:'',
    annee_bac2:''
      },
    
    
    }),
    methods:{
        addtask(){
            console.log(this.form.CNE)
            console.log(this.form.CNI)
        axios.post('/api/user_profils',this.form)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
           
        },
        selectFile(event) {
            
            this.photo = event.target.files[0];
            const data = new FormData();
        data.append('photo', this.photo);

        axios.post("/api/storage/app/CV", data);
        },
        Cnir(even) {
            
            this.cnir = even.target.files[0];
            const dat = new FormData();
        dat.append('cnir', this.cnir);

        axios.post("/api/storage/app/cnir", dat);
        },
        Cniv(even) {
            
            this.cniv = even.target.files[0];
            const dat = new FormData();
        dat.append('cniv', this.cniv);

        axios.post("/api/storage/app/cniv", dat);
        },
        Dp(even) {
            
            this.dp = even.target.files[0];
            const dat = new FormData();
        dat.append('dp', this.dp);

        axios.post("/api/storage/app/dp", dat);
        },
        Pic(events) {
            
            this.pic = events.target.files[0];
            const dataa = new FormData();
        dataa.append('pic', this.pic);

        axios.post("/api/storage/app/public", dataa);
        },
         R1(events) {
            
            this.r1 = events.target.files[0];
            const dataa = new FormData();
        dataa.append('r1', this.r1);

        axios.post("/api/storage/app/r1", dataa);
        },
         R3(events) {
            
            this.r3 = events.target.files[0];
            const dataa = new FormData();
        dataa.append('r3', this.r3);

        axios.post("/api/storage/app/r3", dataa);
        },
         R4(events) {
            
            this.r4 = events.target.files[0];
            const dataa = new FormData();
        dataa.append('r4', this.r4);

        axios.post("/api/storage/app/r4", dataa);
        },
         R2(events) {
            
            this.r2 = events.target.files[0];
            const dataa = new FormData();
        dataa.append('r2', this.r2);

        axios.post("/api/storage/app/r2", dataa);
        },
        

        
       
                }
    }
  
</script>
