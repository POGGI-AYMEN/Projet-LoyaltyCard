<?php 

    class HistoriqueModel
{
    public function selectAll($client) 
    {
        include "../config/database.php" ;
        
        
    	$selectQuery = $con->prepare('SELECT * FROM Historique WHERE client = ?') ; 

    	$selectQuery->execute([$client]) ; 

    	$articles = $selectQuery->fetchAll() ; 

    	return $articles; 
    }


        public function insert($product) 
    {

        include "../config/database.php" ; 

        $insert = $con->prepare("INSERT INTO Historique (article , prix , quantité , date , facture_code , client) VALUES (? , ? , ? , ? , ? , ?)") ; 

        $insert->execute([$product['article'] , $product['prix'], $product['quantité'] , $product['date'] , $product['facture'] , $product['client']]) ; 
    }
    

    public function selectWhereFacture($facture) 
    {
    	include "../config/database.php" ; 

    	$selectQuery = $con->prepare('SELECT * FROM Historique WHERE facture_code = ?') ; 

    	$selectQuery->execute([$facture]) ; 

    	$articles = $selectQuery->fetchAll() ; 

    	return $articles; 
    }
}