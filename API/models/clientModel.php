<?php

include "config/Database.php";


    class ClientModel
    {
        public function getAll()
        {
            $dbConnexion = Database::getConnection();

            $selectQuery = $dbConnexion->prepare("SELECT * FROM Clients");

            $selectQuery->execute();

            $client = $selectQuery->fetchAll();

            return $client;
        }

        public function selectWhere($where, $value)
        {
            $dbConnexion = Database::getConnection();

            $selectQuery = $dbConnexion->prepare("SELECT * FROM Clients WHERE " . $where . " = ?");

            $selectQuery->execute([$value]);

            $client = $selectQuery->fetch(PDO::FETCH_ASSOC);

            return $client;
        }

        public function delete($value)
        {
            $dbConnexion = Database::getConnection();

            $deletQuery = $dbConnexion->prepare("DELETE FROM Clients WHERE id = ?");

            $deletQuery->execute([$value]);

        }

        public function updateClient($data, $client)
        {
            $dbConnexion = Database::getConnection();

            $update = $dbConnexion->prepare("UPDATE Clients SET nom = ? , prenom = ? , email = ?  ,  adresse = ? , num_tel = ? , code_postal = ? , ville = ? WHERE id = ?");

            $update->execute([
                $data['nom'],
                $data['prenom'],
                $data['email'],
                $data['adresse'],
                $data['num_tel'],
                $data['code_postal'],
                $data['ville'],
                $client


            ]);


        }

        public function createClient($client)
        {
            $dbConnexion = Database::getConnection();

            $insertQuery = $dbConnexion->prepare("INSERT INTO Clients (nom, prenom, num_tel, email, mdp, adresse, ville ,code_postal ,pays, num_carte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? , ?)");

            $insertQuery->execute([
                $client['name'],
                $client['lastName'],
                $client['phone'],
                $client['email'],
                $client['password'],
                $client['adresse'],
                $client['city'],
                $client['code_postal'],
                $client['country'],
                $client['card_number']
            ]);

        }


    }

