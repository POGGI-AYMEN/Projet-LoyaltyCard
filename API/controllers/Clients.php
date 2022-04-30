<?php

include "models/clientModel.php";
include "config/responsse.php";

    final class Client
    {
    // sélectionne tous les clients
        final static function get()
        {
            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
            ];

            $clients = ClientModel::getAll();
            $body = ["success" => true, "users" => $clients];

            echo Response::json($statusCode, $headers, $body);
        }

        //selectionne un seul client
        final static function getOneClient($where , $client)
        {
            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
            ];

            $clients = ClientModel::selectWhere("id" , $client);
            $body = ["success" => true, "users" => $clients];

            echo Response::json($statusCode, $headers, $body);
        }

        // supprime un client de la base de donnée

        final static function delete($client)
        {
            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
            ];

           ClientModel::delete($client) ;
            $body = ["success" => true, "message" => "user deleted from database"];

            echo Response::json($statusCode, $headers, $body);
        }

        final static function update($client)
        {
            $data =  json_decode(file_get_contents("php://input") , true);


            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
            ];

            $body = ["success" => true, "message" => "Client modified"];

          ClientModel::updateClient( $data, $client) ;


            echo Response::json($statusCode, $headers, $body);

        }

        final static function post()
        {
            include "models/carteModel.php" ;

            $data =  json_decode(file_get_contents("php://input") , true);


            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
            ];

            $body = ["success" => true, "message" => "Client add"];

            $data['card_number'] = CarteModel::generateCardNumber() ;

            ClientModel::createClient($data) ;
            echo Response::json($statusCode, $headers, $body);


        }
    }