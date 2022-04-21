<?php

    class PanelModel
    {
        // selectionne un article en fonction du client et une valeur choisi
        public function selectAllWhereClient($where , $value , $client)
        {
            include "../config/database.php" ;

            $selectQuery = $con->prepare("SELECT * FROM Panier WHERE ".$where." = ? AND client = ?") ;

            $selectQuery->execute([$value , $client]) ;

            $article = $selectQuery->fetch(PDO::FETCH_ASSOC) ;

            return $article ;
        }
            // insert un article dans le panier
        public function insertArticle($article)
        {
            include "../config/database.php" ;

            $insertQuery = $con->prepare("INSERT INTO Panier (client , article , prix , catégorie , quantité , image) VALUES (? , ? , ? , ?, ?, ?)") ; 

            $insertQuery->execute([
                $article['client'] ,
                $article['article'] ,
                $article['prix'] ,
                $article['catégorie'] ,
                $article['quantité'],
                $article['image']
            ]) ;
        }
            // selectionne tous les article dans le panier
        public function selectAll($client)
        {
            include "../config/database.php" ;

            $selectQuery = $con->prepare("SELECT * FROM Panier WHERE client = ?") ;

            $selectQuery->execute([$client]) ;

            $panier = $selectQuery->fetchAll() ;

            return $panier ;

        }

        // update

        public function updateWherePlus($where , $value , $client)
        {
            include "../config/database.php" ;

            $updateQuery = $con->prepare("UPDATE Panier SET quantité = quantité + 1 WHERE ".$where." = ? AND client = ?") ;

            $updateQuery->execute([$value , $client]) ;


        }

        public function updateWhereMinus($where , $value , $client)
        {
            include "../config/database.php" ;

            $updateQuery = $con->prepare("UPDATE Panier SET quantité = quantité - 1 WHERE ".$where." = ? AND client = ?") ;

            $updateQuery->execute([$value , $client]) ;


        }

        public function deletFromWhere($where , $value , $client)
        {
            include "../config/database.php" ;

            $deleteQuery = $con->prepare("DELETE FROM Panier WHERE ".$where." = ? AND client = ?") ;

            $deleteQuery->execute([$value , $client]) ;
        }


    }
