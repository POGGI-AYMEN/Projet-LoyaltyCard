<?php 
include "../controllers/client.php" ;
include "../controllers/admin.php" ; 


include "header.php" ;
?>

<!-- DataTales Example -->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modifier les information du client</h6>
    </div>
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
                        <td> Nom </td>
                        <td>
                            <!-- USER INFORMATION -->
                        </td> 
                    </tr>

                    <tr>
                        <td> Prenom </td>
                        <td>
                            <!-- USER INFORMATION -->
                        </td> 
                    </tr>

                    <tr>
                        <td> Email </td>
                        <td>
                            <!-- USER INFORMATION -->
                        </td> 
                    </tr>

                  <tr>
                    <td>
                       Numéro de téléphone
                    </td>
                    <td>
                      <!-- USER INFORMATION -->
                    </td> 
                  </tr>

                    <tr>
                        <td> Mot de passe </td>
                        <td>
                           <!-- USER INFORMATION -->
                        </td> 
                    </tr>

                  <tr>
                    <td>Adresse</td>
                    <td>
                      <!-- USER INFORMATION -->
                    </td> 
                  </tr>

                  <tr>
                    <td>Ville</td>
                    <td>
                      <!-- USER INFORMATION -->
                    </td> 
                  </tr>

                  <tr>
                    <td>Code postal</td>
                    <td>
                      <!-- USER INFORMATION -->
                    </td> 
                  </tr>      
                </tbody>
            </table>
            <input id="editB" type="submit" class="btn btn-secondary" name="updateEntreprise" value="Enregistrer">
        </div>
    </div>
</form>
</div>
</div>


  
<?php
require("footer.php");
?>
