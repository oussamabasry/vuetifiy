<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <style>
.card{
    border: 1px solid #D7DBDD ;
    border-radius: 12px;
    margin: auto;
    padding: 30px;
    width: 400px;
    height: 330px;

}
.logo{
    width: 200px;
    height: 90px;
}

h3{
    color: #2980B9;
}
.content{
    margin-top:20px;
    margin-bottom: 20px;
    font-size: 15px;
    font-family: 'Quicksand', sans-serif;
    color: black;
}
.token{
    background-color: #F2F3F4;
    border: 1px solid #B2BABB;
    padding: 9px;
    font-size: 15px 19px;
    margin: auto;
}
.button  {
         background-color: #1F618D ;
         border: none;
         color: whitesmoke;
         padding:10px;
         text-align: center;
         text-decoration: none;
         font-size: 14px;
         margin: 0px 7px;
         }
.coord{
    font-size: 13px;
    font-family: 'Quicksand', sans-serif;
    color: #001069;
}

a{
    text-decoration: none;
}

.divtoken{
    text-align: center;
}


</style>
</head>
<body>
<div class="card">
   <div>
         <h3>ENSET Concours</h3>
   </div>
    <hr>
    <div class="content">
       <p>Bonjour,<br>
         Nous avons reçu une demande de réinitialisation de votre mot de passe sur la plate-forme ENSET Concours.
         Entrez le code de réinitialisation du mot de passe suivant: <br>
       <div class="divtoken"><span class="token">{{$token}}</span></div>
    </p>
    </div>
    
    <div class="footer">
     <p class="coord"><b style="color:#FF3737;">ENSET Councours</b><br>
        Adresse E-mail: concous.enset@gmail.com <br>
        Tél. : 05 23 32 22 20 - 05 23 32 35 30 <br>
        Fax : 05 23 32 25 46 <br>
        Site : <a href="https://www.enset-media.ac.ma/">www.enset-media.ac.ma</a>
    </p>
    </div>

  </div>

</body>
</html>
