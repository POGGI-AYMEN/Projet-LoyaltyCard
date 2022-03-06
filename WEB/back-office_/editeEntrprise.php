<?php 
session_start() ;


include "../config/database.php" ; 

if (isset($_POST['submit'])){


    $email = $_POST['email'] ; 
    $num = $_POST['num'] ; 
    $gérant = $_POST['gérant'] ; 
    $chiffre_daffaire = $_POST['chif_affaire'] ; 
    $contrat = $_POST['contrat'] ; 
    $date_de_payement = $_POST['date'] ; 
    if (!filter_var($email , FILTER_VALIDATE_EMAIL)) {
      $error = "adresse email non valide" ; 
    }

    $sql = "UPDATE Entreprise SET email = ? , gérant = ? , numéro_tel = ? , chiffre_daffaire = ? , contrat = ? , date_de_payement = ?" ; 

    $req = $con->prepare($sql) ; 
    
    $req->execute([$email , $gérant , $num , $chiffre_daffaire , $contrat , $date_de_payement]) ;
  

  } else {
    $error = "Veuillez remplire un champ de saise au minimum" ; 
  }


?>



<!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/gestion_entreprise.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Gestion entreprise</title>
   </head>
   <?php if (isset($_SESSION['adminId'])) { ?>

   <body>

   		<header>
   		<?php  include "header.php" ;  ?>	
   		</header>

      <?php 
      include "../config/database.php" ; 

      if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id  = $_GET['id'] ; 
      } else {
        header('location:../error.php?message=Erruer 404 not found') ; 
      }

      $sql = "SELECT * FROM Entreprise WHERE id = ? "  ; 
      $req = $con->prepare($sql);
      $req->execute([$id]) ; 

      $result = $req->fetch(PDO::FETCH_ASSOC) ; 
      
      ?>

    

   		</main>
      <h1 id="title"><?php echo  $result['nom'] ; ?></h1>
<div class="editContainer">
       
<form method="post">
  <p>email</p>
  <input type="text" name="email" value=<?php echo $result['email']; ?>>
  <p>Numéro de téléphone</p>
  <input type="text" name="num" value=<?php echo $result['numéro_tel']; ?>>
  <p>Gérant</p>
  <input type="text" name="gérant" value=<?php echo $result['gérant']; ?>>
  <p>Chiffre d'affaire</p>
  <input type="text" name="chif_affaire" value=<?php echo $result['chiffre_daffaire']; ?>>
  <p>Durée de contrat</p>
  <input type="text" name="contrat" value=<?php echo $result['contrat']; ?>>
  <p>Date du dernier payement</p>
  <input type="text" name="date" value=<?php echo $result['date_de_payement']; ?>>
<br>
  <input id="editB" type="submit" name="submit" value="Enregistrer">



</form>

        </div>  


        </main>
   		

   </body>
 <?php }else { header('location:../error.php?message=403 Forbbiden') ;} ?>
   </html>

