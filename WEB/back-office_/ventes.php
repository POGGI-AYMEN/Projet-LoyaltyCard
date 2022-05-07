<?php
session_start() ;
require("header.php");

include "../controllers/ventes.php" ;

?>

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Ventes</h1>
   	<div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gestions des ventes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
        
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>

                            <tr>
                                <th>Produit</th>
                                <th>Date</th>
                                <th>Entrepots</th>
                                <th>Quantité vendu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($salesList as $sale) { ?>

                            <tr>                  
                                <td>
                                    <?php echo $sale['nom_article'] ; ?>
                                </td>
                                <td>
                                    <?php echo $sale['date'] ; ?>
                                </td>
                                <td>
                                    <?php echo $sale['entrepots'] ; ?>
                                </td>
                                <td>
                                    <?php echo $sale['quantité'] ; ?>
                                </td>
                            </tr>
            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>
		
<?php require("footer.php"); ?>





