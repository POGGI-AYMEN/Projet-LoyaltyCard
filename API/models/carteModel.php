<?php

include_once "config/Database.php" ;

    class carteModel
{

        public function generateCardNumber()
        {
            do {
                $characters = '1234567890';
                $string = '';

                for ($count = 0; $count < 9 ; $count++) {
                    $tmp = rand(0, strlen($characters) - 1);
                    $string .= $characters[$tmp];
                }

                $verif = CarteModel::selectAllWhere("num_carte" , $string) ;

            } while (!empty($verif)) ;

            return $string ;
        }


        public function selectAllWhere($where , $value)
        {


            $dbConnexion = Database::getConnection() ;

            $selectQuery = $dbConnexion->prepare("SELECT * FROM Carte WHERE ".$where." = ?") ;

            $selectQuery->execute([$value]) ;

            $card = $selectQuery->fetch(PDO::FETCH_ASSOC) ;

            return $card ;
        }

        public function updatePointsPlus($data , $cardNumber)
        {
            $dbConnexion = Database::getConnection() ;

            $updateQuery = $dbConnexion->prepare("UPDATE Carte SET points = points + ? WHERE num_carte = ?") ;

            $updateQuery->execute([$data , $cardNumber]) ;
        }


        public function updatePointsMinus($data , $cardNumber)
        {
            $dbConnexion = Database::getConnection() ;

            $updateQuery = $dbConnexion->prepare("UPDATE Carte SET points = points - ? WHERE num_carte = ?") ;

            $updateQuery->execute([$data , $cardNumber]) ;


        }


    }