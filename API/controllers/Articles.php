<?php

include "models/articleModel.php";
include "config/responsse.php";

final class Article
{
    // get tous les article
    final static function get()
    {
        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json",
        ];

        $articles = ArticleModel::getAll();

        if (!empty($articles)) {
            $body = ["success" => true, "users" => $articles];

            echo Response::json($statusCode, $headers, $body);
            die() ;
        }
        else{
            $body = ["success" => false, "articles" => null];

            echo Response::json($statusCode, $headers, $body);
            die() ;
        }

    }
    // get les article d'une seul entreprise
    final static function getOneArticle($where , $company)
    {
        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json",
        ];

        $articles = ArticleModel::selectWhere($where , $company);

        if (!empty($articles))
        {
            $body = ["success" => true, "articles" => $articles];


            echo Response::json($statusCode, $headers, $body);
        }

        else
        {
            $body = ["success" => true, "articles" => null];


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

        ArticleModel::deleteFrom($article) ;
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
        if ($type === "price")
        {
            ArticleModel::updatePrice($data , $article) ;
            die() ;
        }

        if ($type === "stock")
        {
            ArticleModel::updateStock($data , $article) ;
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


        ArticleModel::create($data) ;
        echo Response::json($statusCode, $headers, $body);


    }
}