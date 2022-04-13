<?php 

session_start() ; 

// on tue la session 
session_destroy() ; 

// redirection vers la page de connexion 
header('location:../connexion.php') ; 