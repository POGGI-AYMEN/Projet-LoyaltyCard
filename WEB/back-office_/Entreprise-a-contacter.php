<?php
$i = 0 ;
include "../controllers/entreprise.php" ;
include "../controllers/admin.php" ; 
    require("header.php");
    ?>

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Entreprises</h1>

    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Contacter une entreprise</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php 
           
           foreach($companys as $company) {
       ?>

                        <td>
							<p><?php echo $company['id']. "  ".$company['nom']; ?></p>
						</td>
                        <td>
							<a id="contact" href="Messagerie.php?id=<?php echo $company['id']; ?>">Contact</a>
						</td>
                    </tr>
                    <?php }
        $i++ ?>
                    
                </tbody>
            </table>
            <a href="Contacter.php" class="btn btn-primary mt-3">Retour</a>

        </div>
    </div>
</div>
    
   
</div>

   		

  

<?php

require("footer.php");
?>
   </html>




