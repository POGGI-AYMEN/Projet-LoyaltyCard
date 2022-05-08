<?php 
session_start() ;

include_once "../controllers/admin.php" ;

include_once "../controllers/entreprise.php" ;


?>

<!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/gestion_entreprise.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Infos entreprise</title>
   </head>
   <?php if (isset($_SESSION['adminId'])) { ?>

   <body>

   		
   		<?php  include "header.php" ;  ?>	
   	


  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Information de l'entreprise <strong><?php echo  $company['nom'] ; ?></strong></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      
                        <th>Nom</th>
                        <th>Information</th>
                       
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                    ID
                    </td>
                    <td>
                    <p><?php echo $company['id']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>
                    NOM
                    </td>
                    <td>
                    <p><?php echo $company['nom']; ?></p>
                    </td> 
                  </tr>
                  <tr>
                    <td>EMAIL</td>
                    <td> <p><?php echo $company['email']; ?></p> </td>
                  </tr> 
                  <tr>
                    <td>TELEPHONE</td>
                    <td> <p><?php echo $company['numéro_tel']; ?></p> </td>
                  </tr> 

                  <tr>
                    <td>
                    GÉRANT
                    </td>
                    <td>
                    <p><?php echo $company['gérant']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>DATE DE CREATION</td>
                    <td>
                    <p><?php echo $company['date_de_création']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>SIEGE SOCIALE</td>
                    <td>
                    <p><?php echo $company['adresse']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>SECTEUR D'ACTIVITE</td>
                    <td> <p> <?php echo $company['activité']; ?> </p> </td>
                  </tr>  
                  <tr>
                    <td>SIRET</td>
                    <td> <p><?php echo $company['siret']; ?></p> </td>
                  </tr> 
                   
                  <tr>
                    <td>chiffre d'affaire de l'année <?php echo date("Y"); ?></td>
                    <td>  <p><?php echo $company['chiffre_daffaire']." "."€"; ?> </td>
                  </tr>  
                  <tr>
                    <td>duré du contrat</td>
                    <td>  <p><?php echo $company['contrat']?> </td>
                  </tr> 
                  <tr>
                    <td>Montant a payer pour l'année <?php echo date("Y"); ?></td>
                    <td> <?php  echo EntrepriseModel::paymentAmount($company['chiffre_daffaire']) ; ?> </td>
                  </tr> 
                  <tr>
                    <td>date du dernier payement</td>
                    <td>  <p><?php echo $company['date_de_payement']?></p> </td>
                  </tr> 
                </tbody>
            </table>
            <a href="gestion_entreprise.php" class="btn btn-primary" >Retour</a>
            
        </div>
    </div>
  </div>

<?php }else { header('location:../error.php?message=403 Forbbiden') ;} ?>
  
 <?php require("footer.php"); ?>




