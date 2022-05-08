<?php

session_start() ;
$i = 0;
include "../controllers/admin.php" ; 
include "../models/clientModel.php" ; 

$info_clients = ClientModel::selectAll() ; 


    require("header.php");
    ?>

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Clients</h1>
   	<div class="container">
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
                        <?php 
                
                foreach($info_clients as $info_client) {
            ?>

                            <tr>
            
                                                
                                <td>
                                    <a href="info_client.php?id=<?php echo $info_client['id']; ?>"><?php echo $info_client['nom']; ?></a>
                                </td>
                                <td>
                                    <a id="delete" href="../controllers/client.php?removeClient=<?php echo $info_client['id']; ?>">Supprimer</a>
                                </td>
                                <td>
                                    <a id="edit" href="edit_client.php?id=<?php echo $info_client['id']; ?>">Modifier</a>
                                </td>
                                <td>
                                    <a id="contact" href="messageEntreprise.php?id=<?php echo $info_client['id']; ?>">Contact</a>
                                </td>
                            </tr>
                            <?php } ?>
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




