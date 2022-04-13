<?php

session_start() ; 
include "../models/candidaturModel.php" ; 

if (isset($_SESSION['adminId']))
{

$candidateCount = CandidatureModel::count() ; 

$candidat = CandidatureModel::selectAll() ; 

if (isset($_GET['deleteEntreprise']) && !empty($_GET['deleteEntreprise'])) 
{
    $candidat = $_GET['deleteEntreprise'] ; 

    CandidatureModel::deletWhere("email" , $candidat) ; 

    header('location:../back-office_/Condidature.php') ; 

    $message = "<html>
   <p>vote candidature n'a psa été accepté</p>
    </html>" ; 
    $headers = 'From: loyalty.card6@gmail.com' . "\r\n" ;

    mail($email , "candidature" ,$message) ;   
    
    header('location:../back-office_/Condidature.php') ; 
    

    die() ; 
}




if (isset($_GET['addEntreprise']) && !empty($_GET['addEntreprise'])) 
{
    include "../models/entrepriseModel.php" ; 
    include "../config/password.php" ;

    $id = $_GET['addEntreprise'] ; 

    $candidat = CandidatureModel::selectAllWhere($id) ; 

    $string = Password::generatePassword() ; 

    $password = base64_encode(hash_hmac('sha256' , $string , 'toto'));   /*hash du mot de pass */
    
    $candidat['mdp'] = $password ; 
  
    $check = EntrepriseModel::insertEntreprise($candidat) ; 

    CandidatureModel::deletWhere("email" , $id) ; 

    $message = "<html>
    <p>Nous vous informant que votre candidature a été accepter vous trouvez au dessous votre mote de passe temporaire</p>
    <br>
    <p>nous vous recommendons de changer votre mot de passe aprés votre premier connexion</p>
    <p> votre nouveau mot de passe : <?php $password ?> </p>
    </html>" ; 
    $headers = 'From: loyalty.card6@gmail.com' . "\r\n" ;

    mail($email , "candidaure" , $message) ;   
    
    header('location:../back-office_/Condidature.php') ; 
    
    die() ; 
   
}




}