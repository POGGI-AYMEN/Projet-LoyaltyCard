<?php 
include "../controllers/entreprise.php" ;
include "../controllers/admin.php" ; 


include "header.php" ;
?>

<!-- DataTales Example -->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ajouter un produit </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <form method="post">
                        <th>Produit</th>
                        <th>Valeur</th>
                       
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Code produit
                    </td>
                    <td>
                       <!-- BACK-END (INFORMATION OF PRODUCT) -->
                    </td> 
                  </tr>

                  <tr>
                    <td>
                    Nom
                    </td>
                    <td>
                      <!-- BACK-END (INFORMATION OF PRODUCT) -->
                    </td> 
                  </tr>

                  <tr>
                    <td>
                      Prix
                    </td>
                    <td>
                      <!-- BACK-END (INFORMATION OF PRODUCT) -->
                    </td> 
                  </tr>

                  <tr>
                    <td>Quantité en stock</td>
                    <td>
                      <!-- BACK-END (INFORMATION OF PRODUCT) -->
                    </td> 
                  </tr>

                  <tr>
                    <td>Description</td>
                    <td>
                        <!-- BACK-END (INFORMATION OF PRODUCT) -->
                    </td> 
                  </tr>

                    
                </tbody>
            </table>
            <input id="editB" type="submit" class="btn btn-secondary" name="updateEntreprise" value="Ajouter">
        </div>
    </div>
</form>
</div>
</div>


  
<?php
require("footer.php");
?>
