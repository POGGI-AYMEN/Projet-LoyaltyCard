<?php
$i = 0 ;
include "../controllers/client.php" ;
include "../controllers/admin.php" ; 

    require("header.php");
    ?>

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Clients</h1>
   	<div class="container">
   		<?php 
           
			foreach($info_clients as $info_client) {
		?>

		

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Gestions des clients</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Supprimer</th>
                        <th>Modifier</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                                            <!-- J'AI COPIÉ LE CODE DE GESTION ENTREPRISE -->
                                            <!-- FAUT L'ADAPTER PAR RAPPORT AU CLIENT -->
                        <td>
							<a href="info_client.php?id=<?php echo $info_client[$i]['id']; ?>"><?php echo $info_client[$i]['id']. "  ".$info_client[$i]['nom']; ?></a>
						</td>
                        <td>
							<a id="delete" href="../controllers/entreprise.php?removeCompany=<?php echo $info_client[$i]['id']; ?>">Supprimer</a>
						</td>
                        <td>
							<a id="edit" href="editeEntrprise.php?editEmail=<?php echo $info_client[$i]['email']; ?>">Modifier</a>
						</td>
                        <td>
							<a id="contact" href="messageEntreprise.php?id=<?php echo $info_client[$i]['id']; ?>">Contact</a>
						</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
		<?php }
        $i++ ?>

	</div>
			</div>

   		

  

<?php

require("footer.php");
?>
   </html>




