<?php 

    class ArticleModel 
    {
        public function selectAll() 
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Article "); 

            $selectQuery->execute() ; 

            $articles = $selectQuery->fetchAll() ; 

            return $articles ; 
        }

        public function selectAllWhere($where , $value) 
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Article WHERE ".$where." = ?") ; 

            $selectQuery->execute([$value]) ; 

            $article = $selectQuery->fetch(PDO::FETCH_ASSOC) ; 

            return $article ; 
        }

        public function updateWhereMinus($where , $value) 
        {
            include "../config/database.php" ; 

            $updateQuery = $con->prepare("UPDATE Article SET quantité = quantité - 1 WHERE " .$where. " = ?") ; 

            $updateQuery->execute([$value]) ; 
        }
        public function updateWherePlus($where , $value) 
        {
            include "../config/database.php" ; 

            $updateQuery = $con->prepare("UPDATE Article SET quantité = quantité + 1 WHERE " .$where. " = ?") ; 

            $updateQuery->execute([$value]) ; 
        }

        public function updateQuantityMinus($quantity , $article) 
        {
            include "../config/database.php" ; 

            $updateQuery = $con->prepare("UPDATE Article SET quantité = quantité - ? WHERE article = ?") ; 

            $updateQuery->execute([$quantity , $article]) ; 

        }

        public function updateArticle($article) 
        {
            include "../config/database.php" ; 


            $updateQuery = $con->prepare("UPDATE Article SET prix = ? , catégorie = ? , quantité = ? , Description = ? WHERE codeArticle = ?") ; 

            $updateQuery->execute([
                $article['prix'] , 
                $article['catégorie'] ,
                $article['quantité'] , 
                $article['Description'] ,
                $article['codeArticle']
            ]) ; 

        }

        public function deleteFrom($code) 
        {
            include "../config/database.php" ; 

            $deleteQuery = $con->prepare('DELETE FROM Article WHERE codeArticle = ?') ; 

            $deleteQuery->execute([$code]) ; 

        }

        public function generateCode() 
        {

            
        do {
               $characters = 'AZERRTYUIOPMLKJHGFDSQWXCVBN1234567890';
            $string = '';
          
            for ($count = 0; $count < 5 ; $count++) {     
              $tmp = rand(0, strlen($characters) - 1);
              $string .= $characters[$tmp];
          }
        
          $verif = ArticleModel::selectAllWhere("codeArticle" , $string) ; 

           } while (!empty($verif)) ;
           
        return $string ; 
    }

    public function addNewArticle($product)
    {
        include "../config/database.php" ; 

        $insertQuery = $con->prepare("INSERT INTO Article (codeArticle , nom , catégorie , prix , vendeur , quantité , entrepot ,Description , image ) VALUES (? , ?, ?, ?, 'LoyaltyBoost',? ,?,?,?)") ; 

        $insertQuery->execute([

        $product['codeArticle'] ,
        $product['nom'] ,
        $product['catégorie'] ,
        $product['prix'] ,
        $product['quantité'] ,
        $product['entrepots'] ,
        $product['description'],
        $product['image'] 
        
      
       
        ]) ; 


    }
}