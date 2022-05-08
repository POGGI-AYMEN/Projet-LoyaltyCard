<?php

class PrestationModel
{
    public function insert($product)
    {
        include "../config/database.php" ;

        $insertQuery = $con->prepare("INSERT INTO Prestation (nom , date_debut , date_fin , catégorie , description ,image , entreprise) VALUES (?,?, ?,? , ? , ? , ? )") ;

        $insertQuery->execute([
            $product['prestation'] ,
            $product['date_debut'] ,
            $product['date_fin'] ,
            $product['catégorie'] ,
            $product['description'] ,
            $product['image'] ,
            $product['entreprise']
        ]) ;
    }

    public function selectAll()
    {
        include "../config/database.php";

        $selectQuery = $con->prepare("SELECT * FROM Prestation ");

        $selectQuery->execute();

        $result = $selectQuery->fetchAll() ;

        return $result ;

    }

    public function selectAllWhere($where , $value)
    {
        include "../config/database.php";

        $selectQuery = $con->prepare("SELECT * FROM Prestation WHERE " . $where . " = ?");

        $selectQuery->execute([$value]);

        $result = $selectQuery->fetch(PDO::FETCH_ASSOC) ;

        return $result ;

    }
    public function deleteWhere($id)
    {
        include "../config/database.php";

        $selectQuery = $con->prepare("DELETE FROM Prestation WHERE id = ?");

        $selectQuery->execute([$id]);

    }

    public function update($product , $id)
    {
        include "../config/database.php";

        $insertQuery = $con->prepare("UPDATE Prestation SET nom = ? , date_fin = ? , catégorie = ? , description = ? WHERE id = ?") ;

        $insertQuery->execute([
            $product['prestation'] ,
            $product['date_fin'] ,
            $product['catégorie'] ,
            $product['description'] ,
            $id

        ]) ;
    }
}