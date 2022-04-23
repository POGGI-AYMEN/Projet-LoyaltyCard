<?php 

include "../models/ventesModel.php" ;

$salesAdmin = VentesModel::selectAll() ;

if (isset($_SESSION['clientId'])) {
    $sales = VentesModel::selectAllWhere($_SESSION['clientId']);


    $salesCount = 0;
    for ($i = 0; $i < count($sales); $i++) {
        $salesCount = $salesCount + $sales[$i]['quantité'];
    }
}

$salesCountAdmin = 0 ;
for ($i = 0 ; $i < count($salesAdmin) ; $i++)
{
    $salesCountAdmin = $salesCountAdmin + $salesAdmin[$i]['quantité'] ;
}

