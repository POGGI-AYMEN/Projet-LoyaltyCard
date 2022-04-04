<?php 

class VentesModel
{
    public function count () 
    {
        include "../config/database.php" ; 

        $countQuery = $con->prepare("SELECT * FROM Ventes") ; 

        $countQuery->execute() ; 

        $count = $countQuery->rowCount() ; 

        return $count ; 
    }

    


}