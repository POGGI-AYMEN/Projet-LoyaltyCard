<?php


$amount = $_GET['amount'] * 100 ;
$points = $_GET['points'] ;


include_once "../controllers/carte.php" ;
include_once "../controllers/panier.php" ;
include_once "../config/password.php" ;



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
    "amount" => $amount,
    "currency" => "eur",
    "description" => "success",
    "customer" => $customer->id
));

$facture = Password::generatePassword() ;

for ($i = 0 ; $i < count($myPanel) ; $i++)
{
// update du stock
  include_once "../models/articleModel.php" ;

 ArticleModel::updateQuantityMinus($myPanel[$i]['quantité'] , $myPanel[$i]['article']) ;

 // on ajout l'achat dans l'historique des achat du client //

 include_once "../models/historiqueModel.php" ;

$product['article'] = $myPanel[$i]['article']  ;
$product['quantité'] = $myPanel[$i]['quantité'] ;
$product['prix'] = $myPanel[$i]['prix'] ;
$product['date'] = date("j/n/Y") ;
$product['facture'] = $facture ;
$product['client'] = $_SESSION['clientId'] ;
$product['image'] = $myPanel[$i]['image'];


HistoriqueModel::insert($product) ;


// insertion dans la table des ventes //


$articlData = ArticleModel::selectAllWhere("nom" , $myPanel[$i]['article']) ;

$product['codeArticle'] = $articlData['codeArticle'] ;
$product['entrepots'] = $articlData['entrepot'] ;
$product['client'] = $_SESSION['clientId'] ;

include_once "../models/ventesModel.php" ;

VentesModel::insert($product) ;

// update du panier
  include_once "../models/panierModel.php" ;

 PanelModel::deletFromWhere("article" , $myPanel[$i]['article'] , $user['id']) ;


}

$curentdata = Cart::getPoints($user['num_carte']) ;
$curentPoints = $curentdata['points'] ;

// la mis a jour des point de l'utilisateur
if ($_GET['points'] != 0)
{
Cart::updateClientPoints($_GET['points'] , $user['num_carte']) ;     // points dépensé
}

Cart::updateClientPointsAdd($_GET['amount'] , $user['num_carte']) ;   // rajout des points aprés l'achat d'un article

$newData = Cart::getPoints($user['num_carte']) ;
$newPoints = $newData['points'] ;
// envoi des notification a l'utilisateur //

include "../models/notificationModel.php" ;

$notification['date'] = date('j/n/Y') ;
$notification['curentPoints'] = $curentPoints ;
$notification['newPoints'] = $newPoints ;
$notification['message'] = "Vouz venez d'effecture un achat chez LotaltyBoost consulter votre nouveau solde des points" ;
$notification['status'] = 0 ;
$notification['client'] = $_SESSION['clientId'];

NotificationModel::insert($notification) ;


// génération de la facture en format PDF //

$price = $amount / 100 ;
header("location:../config/facture.php?facture=$facture&&amount=$price&&points=".$_GET['points']."") ;






?>
