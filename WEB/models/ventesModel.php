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

    public function selectWhereCount($where , $value) 
    {
        include "../config/database.php" ; 

        $selectQuery = $con->prepare("SELECT * FROM Ventes WHERE ".$where." = ?") ; 

        $selectQuery->execute([$value]) ; 

        $count = $selectQuery->rowCount() ; 

        return $count ; 
    }
    


}