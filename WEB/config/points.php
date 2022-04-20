<?php 

include "../controllers/client.php" ;

$points = CarteModel::pointsCount($user['num_carte']) ; 

$myPoints = $points['points'] ; 

echo $myPoints ; 

   
