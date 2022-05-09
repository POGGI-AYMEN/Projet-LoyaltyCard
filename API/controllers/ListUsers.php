<?php

include "models/ListUsersModel.php";
include "config/responsse.php";

final class ListUsers
{
    // get tous les article
    final static function get($company)
    {
        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json",
        ];

        $users = ListUsersModel::get($company) ;

        if (!empty($users))
        {
            $body = [ "response" =>

                ["success" => true, "prestation" => $users]
            ] ;

            echo Response::json($statusCode, $headers, $body);
        }

        else
        {
            $body = ["success" => true, "prestation" => null];


            echo Response::json($statusCode, $headers, $body);
        }
    }

}