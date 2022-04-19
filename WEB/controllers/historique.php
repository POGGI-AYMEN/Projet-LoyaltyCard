<?php 

    class Historique 
    {
        public function getAll($client) 
        {
            include "../models/historiqueModel.php" ; 

            $products = HistoriqueModel::selectAll($client) ; 

            return $products ; 
        }
    }