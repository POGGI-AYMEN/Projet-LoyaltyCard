<?php

include_once "models/carteModel.php" ;
include "config/responsse.php";

    final class Cartes
    {

        final static function get($cardNumber)
        {
            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
            ];

            $card = CarteModel::selectAllWhere("num_carte" , $cardNumber) ;


            if (empty($card))
            {
                $body = ["success" => false, "card" => null] ;
            } else
            {
                $body = ["success" => true, "users" => $card] ;
            }

            echo Response::json($statusCode, $headers, $body);
        }



        final static function update($cardNumber , $type)
        {

            $data =  json_decode(file_get_contents("php://input") , true);

            $statusCode = 200;

            var_dump(json_encode($data));

            $headers = [
                "Content-Type" => "application/json",
            ];

            if ($type === "plus")
            {
                CarteModel::updatePointsPlus($data , $cardNumber) ;
                $body = ["success" => true, "message" => "updated"] ;

                echo Response::json($statusCode, $headers, $body);
                die() ;

            }

            if ($type === "minus")
            {
                CarteModel::updatePointsMinus($data , $cardNumber) ;
                $body = ["success" => true, "message" => "updated"] ;

                echo Response::json($statusCode, $headers, $body);
                die() ;

            }

        }





    }