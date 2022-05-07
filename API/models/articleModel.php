<?php

include "config/Database.php";

    class ArticleModel
    {
        public function getAll()
        {
            $dbConnexion = Database::getConnection() ;

            $selectQuery = $dbConnexion->prepare("SELECT * FROM Article ");

            $selectQuery->execute() ;

            $articles = $selectQuery->fetchAll() ;

            return $articles ;
        }

        public function selectWhere($where , $value)
        {
            $dbConnexion = Database::getConnection() ;

            $selectQuery = $dbConnexion->prepare("SELECT * FROM Article WHERE ".$where." = ?") ;

            $selectQuery->execute([$value]) ;

            $article = $selectQuery->fetchAll() ;

            return $article ;
        }


        public function deleteFrom($code)
        {
            $dbConnexion = Database::getConnection() ;

            $deleteQuery = $dbConnexion->prepare('DELETE FROM Article WHERE codeArticle = ?') ;

            $deleteQuery->execute([$code]) ;

        }

        public function updateStock ($data , $article)
        {
            $dbConnexion = Database::getConnection() ;

            $updateQuery = $dbConnexion->prepare("UPDATE Article SET quantité = ? WHERE codeArticle = ?") ;

            $updateQuery->execute([$data['data'] , $article]) ;

        }

        public function updatePrice($data , $article)
        {
            $dbConnexion = Database::getConnection() ;

            $updateQuery = $dbConnexion->prepare("UPDATE Article SET prix = ? WHERE codeArticle = ?") ;

            $updateQuery->execute([$data['data'] , $article]) ;
        }

        public function create($product)
        {
            $dbConnexion = Database::getConnection() ;

            $insertQuery = $dbConnexion->prepare("INSERT INTO Article (codeArticle , nom , catégorie , prix , vendeur , quantité , entrepot ,Description) VALUES (  ?, ?, ?, ? ,? ,?,?,?)") ;

            $insertQuery->execute([

                $product['codeArticle'] ,
                $product['nom'] ,
                $product['categorie'] ,
                $product['prix'] ,
                $product['vendeur'],
                $product['quantity'] ,
                $product['entrepots'] ,
                $product['description'],




            ]) ;
        }
    }