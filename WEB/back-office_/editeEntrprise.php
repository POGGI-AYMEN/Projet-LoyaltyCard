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

    $sql_ = "UPDATE Entreprise SET email = ? , gérant = ? , numéro_tel = ? , chiffre_daffaire = ? , contrat = ? , date_de_payement = ?" ; 

    $requette = $con->prepare($sql_) ; 
    
    $requette->execute([$email , $gérant , $num , $chiffre_daffaire , $contrat , $date_de_payement]) ;
  
  } else {
    $error = "Veuillez remplir un champ de saise au minimum" ; 
  }
?>
   <?php if (isset($_SESSION['adminId'])) { 
      if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id  = $_GET['id'] ; 
      } else {
        header('location:../error.php?message=Erruer 404 not found') ; 
      }

      $sql = "SELECT * FROM Entreprise WHERE id = ? "  ; 
      $req = $con->prepare($sql);
      $req->execute([$id]) ; 

      $result = $req->fetch(PDO::FETCH_ASSOC) ; 
      include "header.php" ;
      ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modifier les information de l'entreprise</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Information</th>
                        <th>Update</th>
                       
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Email
                    </td>
                    <td>
                       <input type="text" name="email" value=<?php echo $result['email']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>
                       Numéro de téléphone
                    </td>
                    <td>
                      <input type="text" name="num" value=<?php echo $result['numéro_tel']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>
                      Gérant
                    </td>
                    <td>
                      <input type="text" name="gérant" value=<?php echo $result['gérant']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>Chiffre d'affaire</td>
                    <td>
                      <input type="text" name="chif_affaire" value=<?php echo $result['chiffre_daffaire']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>Durée de contrat</td>
                    <td>
                      <input type="text" name="contrat" value=<?php echo $result['contrat']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>Date du dernier payement</td>
                    <td>
                      <input type="text" name="date" value=<?php echo $result['date_de_payement']; ?>>
                    </td> 
                  </tr>      
                </tbody>
            </table>
            <input id="editB" type="submit" class="btn btn-secondary" name="submit" value="Enregistrer">
        </div>
    </div>
</div>


  
  <?php }else header('location:../error.php?message=403 Forbidden') ;

require("footer.php");
?>
