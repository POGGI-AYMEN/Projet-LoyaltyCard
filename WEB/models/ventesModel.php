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
    
    public function insert($product) 
    {
        include "../config/database.php" ; 

        $insertQuery = $con->prepare("INSERT INTO Ventes (codeArticle , nom_article , client , date , entrepots , quantité, facture_code , vendeur) VALUES (?,?, ? , ? , ? , ? ,? , ?)") ;

        $insertQuery->execute([
            $product['codeArticle'] ,
            $product['article'] , 
            $product['client'] ,
            $product['date'] ,
            $product['entrepots'] ,
            $product['quantité'],
            $product['facture'],
            $product['vendeur']
        ]) ; 
    }

    public function selectAllWhere ($id)
    {
        include "../config/database.php" ;

        $countQuery = $con->prepare("SELECT * FROM Ventes WHERE client = ?") ;

        $countQuery->execute([$id]) ;

      $result = $countQuery->fetchAll() ;

      return $result ;
    }

    public function selectAll()
    {
        include "../config/database.php" ;

        $countQuery = $con->prepare("SELECT * FROM Ventes") ;

        $countQuery->execute([]) ;

        $result = $countQuery->fetchAll() ;

        return $result ;
    }


}