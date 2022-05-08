<?php

include_once "models/EntrepriseModel.php" ;
include "config/responsse.php" ;

    final class Entreprise
    {
        final static function get($entreprise)
        {
            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
                "UTF-8"
            ];

            $entreprise = EntrepriseModel::selectWhere("id" , $entreprise) ;


            if (empty($entreprise))
            {
                $body = ["success" => false, "entreprise" => null];
                echo Response::json($statusCode, $headers, $body);
                die() ;
            }
            $body =[ "response" =>
                ["success" => true, "entreprise" => $entreprise]
                ];
            echo Response::json($statusCode, $headers, $body);
        }

        final static function update($entreprise , $type)
        {
            $data =  json_decode(file_get_contents("php://input") , true);

            var_dump($data);

            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
            ];

            if ($type === "data")
            {
                EntrepriseModel::update($data , $entreprise) ;

                $body = ["success" => true, "message" => "updated"];
                echo Response::json($statusCode, $headers, $body);
                die() ;
            }

            if ($type === "password")
            {
                EntrepriseModel::updatePassword($data , $entreprise) ;

                $body = ["success" => true, "message" => "updated"];
                echo Response::json($statusCode, $headers, $body);
                die() ;

            }

        }
    }