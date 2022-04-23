<?php

session_start() ;
include "../controllers/entreprise.php" ;

include_once "../controllers/admin.php" ;



include "header.php" ;
?>

<!-- DataTales Example -->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modifier les information de l'entreprise</h6>
    </div>
    <p style="color: red; margin-left: 2%;margin-top: 1%;"><?php if(!empty($error)) {echo $error;}  ?></p>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <form method="post">
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
                       <input class="form-control" type="text" name="email" value=<?php echo $company['email']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>
                       Numéro de téléphone
                    </td>
                    <td>
                      <input class="form-control" type="text" name="num" value=<?php echo $company['numéro_tel']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>
                      Gérant
                    </td>
                    <td>
                      <input class="form-control" type="text" name="gérant" value=<?php echo $company['gérant']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>Chiffre d'affaire</td>
                    <td>
                      <input  type="text" class="form-control" name="chif_affaire" value=<?php echo $company['chiffre_daffaire']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>Durée de contrat</td>
                    <td>
                      <input type="text" class="form-control" name="contrat" value=<?php echo $company['contrat']; ?>>
                    </td> 
                  </tr>

                  <tr>
                    <td>Date du dernier payement</td>
                    <td>
                      <input type="text" class="form-control" name="date" value=<?php echo $company['date_de_payement']; ?>>
                    </td> 
                  </tr>      
                </tbody>
            </table>
            <input id="editB" type="submit" class="btn btn-secondary" name="updateEntreprise" value="Modifier">
            <a href="gestion_entreprise.php" class="btn btn-primary">Retour</a>

        </div>
    </div>
</form>
</div>
</div>


  
<?php
require("footer.php");
?>
