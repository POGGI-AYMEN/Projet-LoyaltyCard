<?php 
session_start() ;
include "../models/entrepriseModel.php" ;
if (isset($_SESSION['adminId'])) 
{

    
$companyCount = EntrepriseModel::count() ; 

$companys = EntrepriseModel::selectAll() ;

if (isset($_POST['updateEntreprise'])) 
{
    $email = htmlspecialchars($_POST['email']) ; 
    if (!filter_var($email , FILTER_VALIDATE_EMAIL)) 
    {
        $error = "adress email non valide" ; 
    } 
    $phone = $_POST['num'] ; 
    if (!filter_var($phone , FILTER_VALIDATE_INT)) 
    {
        $error = "numéro non valable" ; 
    }
    $gérant = $_POST['gérant'] ;

    
}


if (isset($_GET['editEmail']) && !empty($_GET['editEmail'])) 
{
    $email = $_GET['editEmail'] ; 

   $company = EntrepriseModel::selectWhere("email" , $email) ; 
    
}

if (isset($_GET['removeCompany']) && !empty($_GET['removeCompany'])) 
{
    $id = $_GET['removeCompany'] ; 
        
    EntrepriseModel::deletWhere("id" , $id) ; 

    header('location:../back-office_/gestion_entreprise.php') ; 

    die() ; 
}



}