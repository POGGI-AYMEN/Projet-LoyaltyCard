<?php 

class ClientModel 
{
        // selectionne tous les client de la base de donnée en format json //
    public function selectAll()
    {
        include '../config/database.php' ; 

        $selectQuery = $con->prepare("SELECT * FROM Clients") ;
        
        $selectQuery->execute() ; 

        $result = $selectQuery->fetchAll() ;

        $clients = json_encode($result) ;
        
        return $clients ; 
    }

    // selectionne les client qu'on veut on fonction des valeur de $where , $value

    // $wher = nom de l'atribut 
    //$vlaue = valeru

    public function selectWhere($where , $value) 
    {
        include '../config/database.php' ; 

        $selectQuery = $con->prepare("SELECT * FROM Clients WHERE ".$where." = ? ") ;   

        $selectQuery->execute([
          
            $value
        ]) ; 

        $result = $selectQuery->fetch(PDO::FETCH_ASSOC) ; 

        $client = json_encode($result) ; 
        return $client ; 
    }

    // update l'atribbut qu'on veut pour un client qu'on choisi 

    public function updateWhere($attribut , $updateValue , $where , $whereValue)
    {
        include "../config/database.php" ; 

        $updateQuery = $con->prepare("UPDATE Clients SET ".$attribut." = ? WHERE ".$where." = ?") ;

        $updateQuery->execute([
            $updateValue ,
            $whereValue
        ]) ;
    }

    // retourn le nombre des ligne dans la table clients //
    public function count()
    {
        include "../config/database.php" ;
        $countQuery = $con->prepare("SELECT * FROM Clients") ; 

        $countQuery->execute() ; 

        $count = $countQuery->rowCount() ; 

        return $count ; 
    }

    // supprime un client de la base de donnée 

    public function deleteClient($where , $value)
    {
        include "../config/database.php" ; 

        $deleteQuery = $con->prepare("DELETE FROM Clients WHERE ".$where." = ?") ; 

        $deleteQuery->execute([$value]) ; 
    }

   
}



   