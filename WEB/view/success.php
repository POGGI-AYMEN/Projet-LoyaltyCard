<?php  
include "../controllers/client.php" ; 
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  
  <hr>
  <p>
    Vous rencontrez des probleme ? <a href="Contact_page.php">Contactez-nous</a>
  </p>
  
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="UserAccount.php" role="button">Continue vers la page d'accueil</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="../config/download.php?fileName=<?php  echo $_GET['facture'] ; ?>" role="button">Télécharger votre facture</a>
  </p>
</div>

<script src="../JS/push.js"></script>