<?php 

    class EntrepriseModel 
    {
        public function count() 
        {
            include "../config/database.php" ; 

            $countQuery = $con->prepare("SELECT * FROM Entreprises") ; 

            $countQuery->execute() ; 

            $count = $countQuery->rowCount() ; 

            return $count ;
        }

        public function selectAll()
        {
            include "../config/database.php" ;
            $selectQuery = $con->prepare("SELECT * FROM Entreprise") ; 

            $selectQuery->execute() ; 

            $entrprises = $selectQuery->fetchAll() ; 

            return $entrprises ; 
        }

        public function selectWhere($where , $value) 
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Entreprise WHERE ".$where." = ?") ; 
        
            $selectQuery->execute([$value]) ; 
        
            $company = $selectQuery->fetch() ; 
            
            return $company ; 
        }

        public function deletWhere ($where , $value)  
        {
            include "../config/database.php" ; 

            $deletQuery = $con->prepare("DELETE FROM Entreprise WHERE ".$where." = ?") ; 

            $deletQuery->execute([$value]) ; 
            
        }

        public function insertEntreprise($candidat) 
        {
            include "../config/database.php" ; 

            $insertQuery = $con->prepare("INSERT INTO Entreprise (nom, gérant, date_de_création, activité, siret, email, mdp, numéro_tel, adresse, ville ,code_postal, pays, chiffre_daffaire, contrat	,date_de_payement 
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)") ; 
        
            $insertQuery->execute([
                $candidat['nom'] , 
                $candidat['gérant'] ,
                $candidat['date_de_création'] ,
                $candidat['activité'] ,
                $candidat['siret'] ,
                $candidat['email'] ,
                $candidat['mdp'] ,
                $candidat['numéro_tel'] ,
                $candidat['adresse'] , 
                $candidat['ville'] , 
                $candidat['code_postal'] , 
                $candidat['pays'] ,
                $candidat['chiffre_daffaire'] ,
                $candidat['contrat'] , 
                $candidat['date_de_payement']
            ]) ;
            
        }

        public function paymentAmount($price)
        {
            if ($price < 200000) { return "Aucun cotisation a payer" ; }
            elseif ($price < 800000 && $price > 200000) {return $price * 0.8 ;}
            elseif ($price > 800000 && $price < 1500000 ) {return  $price * 0.6 ; }
            elseif ($price > 1500000 && $price < 3000000) {return  $price * 0.4 ;}
            elseif ($price > 3000000) {return  $price * 0.3 ; }
        }

        public function updateWhere($company , $id)
        {
            include "../config/database.php" ;

            $updateQuery = $con->prepare('UPDATE Entreprise SET email = ? , gérant = ?, numéro_tel = ? , chiffre_daffaire = ? , contrat = ? , date_de_payement = ? WHERE id = ?') ;

            $updateQuery->execute([
                $company['email'] ,
                $company['gérant'] ,
                $company['num'] ,
                $company['chif_affaire'] ,
                $company['contrat'] ,
                $company['date'] ,
                $id
            ]) ;
            header('location:../back-office_/editeEntrprise.php?id='.$id) ;
        }
        
      
    }