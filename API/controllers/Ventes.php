<?php

include "models/VentesModel.php";
include "config/responsse.php";

    final class Ventes
    {
        final static function get($company)
        {
            $statusCode = 200;

            $headers = [
                "Content-Type" => "application/json",
            ];

          $sales = VentesModel::select($company) ;


            if (empty($sales))
            {
                $body = ["success" => false, "sales" => null] ;
            } else
            {
                $body = ["success" => true, "users" => $sales] ;
            }

            echo Response::json($statusCode, $headers, $body);
        }

    }