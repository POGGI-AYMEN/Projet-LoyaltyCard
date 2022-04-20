<?php
$i = 0 ;
include "../controllers/entreprise.php" ;
include "../controllers/admin.php" ; 

    require("header.php");
    ?>

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Entreprise</h1>
   	<div class="container">
  
		

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Gestions des entreprises</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Supprimer</th>
                        <th>Modifier</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php 
           
           foreach($companys as $company) {
       ?>

                        <td>
							<a href="infoEntreprise.php?id=<?php echo $company['id']; ?>"><?php echo $company['id']. "  ".$company['nom']; ?></a>
						</td>
                        <td>
							<a id="delete" href="../controllers/entreprise.php?removeCompany=<?php echo $company['id']; ?>">Supprimer</a>
						</td>
                        <td>
							<a id="edit" href="editeEntrprise.php?editEmail=<?php echo $company['email']; ?>">Modifier</a>
						</td>
                        <td>
							<a id="contact" href="messageEntreprise.php?id=<?php echo $company['id']; ?>">Contact</a>
						</td>
                    </tr>
                    <?php }
        $i++ ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
	

	</div>
			</div>

   		

  

<?php

require("footer.php");
?>
   </html>




