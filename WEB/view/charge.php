<?php

use Stripe\Terminal\Location;

require_once('vendor/autoload.php');

  \Stripe\Stripe::setApiKey('sk_test_51KlckuBppzACRoKD6e8SSDFpl3BW9tNKk4eYkXobFnuNWPBPnflg13CmKVtkkJW90Su3Z4KjcrSwmrw43IvWzYw700YwBJhfgn');

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST["first_name"];
$last_name = $POST["last_name"];
$email = $POST["email"];
$token = $POST["stripeToken"];



$customer = \Stripe\Customer::create(array(
    "name" => $first_name,
    "email" => $email,
    "source" => $token
));

$charge = \Stripe\Charge::create(array(
    "amount" => 5000,
    "currency" => "usd",
    "description" => "success",
    "customer" => $customer->id
));

//header('Location: success.php');



?>