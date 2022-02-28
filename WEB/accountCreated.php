 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style/inscreption.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Compte créer</title>
   </head>
   <body>

<style>


.contanier{
position: absolute;
left: 50% ;
top : 50% ;
transform: translate(-50% , -50%);
height: 400px ;
width: 800px;
border: solid 2px white ;
background-color: white;
border-top-left-radius: 25px;
border-bottom-right-radius: 25px;
box-shadow: 15px 15px 15px 10px ;
  opacity: 0.7;
}

h1 , h2{
  text-align: center;
  background: linear-gradient(to left ,#0072ff, #8811c5);
  -webkit-background-clip: text ;
  -webkit-text-fill-color: transparent ;

}
p{
  margin-left: 20px ;
  margin-right: 20px;
  margin-top: 40px;
  margin-bottom: 50px;
  font-size: 20px;
  text-align: center;
}
a{
  position: relative;
  left:41%;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
  background: linear-gradient(to left ,#0072ff, #8811c5);
  border: 2px solid white;
  padding: 15px;
  color: white;
  border-radius: 15px;

}


</style>

    <div class="contanier">

      <?php
      $name = $_GET['name'] ;
       ?>
       <h1>Bienvenu <?php echo $name ?></h1>
        <h1>Merci de rejoindre LoayltyBoost</h1>
        <p>Votre compte a été bien créer connectez-vous et demander votre carte de fidelité dés maintenat</p>

        <a href="connexion.php">Se connecter</a>

    </div>



   </body>


 </html>
