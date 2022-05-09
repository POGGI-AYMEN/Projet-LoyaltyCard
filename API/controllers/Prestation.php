<?php

include "models/PrestationModel.php";
include "config/responsse.php";

final class Prestation
{
    // get tous les article
    final static function get($company)
    {
        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json",
        ];

      $prestations = PrestationModel::selectAllWhere("entreprise" , $company) ;

        if (!empty($prestations))
        {
            $body = [ "response" =>

                ["success" => true, "prestation" => $prestations]
] ;

            echo Response::json($statusCode, $headers, $body);
        }

        else
        {
            $body = ["success" => true, "prestation" => null];


            echo Response::json($statusCode, $headers, $body);
        }
    }



    // supprime un client de la base de donnée

    final static function delete($article)
    {
        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json",
        ];

        PrestationModel::deleteWhere($article)  ;
        $body = ["success" => true, "message" => "user deleted from database"];

        echo Response::json($statusCode, $headers, $body);
    }

    final static function update($article , $type)
    {
        $data =  json_decode(file_get_contents("php://input") , true);


        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json",
        ];

        $body = ["success" => true, "message" => "Article modified"];

        // sleon le type récupérer dans le get on update soit le prix ou la quantité de l'atticle souhaité
        if ($type === "date_debut")
        {
            PrestationModel::updateDebut($data , $article) ;
            die() ;
        }

        if ($type === "date_fin")
        {
            PrestationModel::updateFin($data , $article) ;
            die();
        }

        echo Response::json($statusCode, $headers, $body);

    }

    final static function post()
    {

        $data =  json_decode(file_get_contents("php://input") , true);


        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json",
        ];

        $body = ["success" => true, "message" => "Client add"];


        PrestationModel::insert($data) ;
        echo Response::json($statusCode, $headers, $body);


    }
}