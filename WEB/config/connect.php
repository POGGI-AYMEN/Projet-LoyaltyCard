<?php
include "database.php" ; 

if (isset($_POST['connect'])) {
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
        
        /*recupération des variable POST */

        $email = htmlspecialchars($_POST['email']) ; 
        $password = base64_encode(hash_hmac('sha256' , $_POST['password'] , 'toto'));   /*hash du mot de pass */

        /* tableau des requets SQL */ 
        $sql = [
            "SELECT * FROM Clients WHERE email = :email AND mdp = :password" , 
            "SELECT * FROM Admin WHERE email = :email AND mdp = :password" ,
            "SELECT * FROM Entreprise WHERE email = :email AND mdp = :password"
        ] ; 
    

        for ($count = 0 ; $count < 3 ; $count++) {
                                                        
            $req = $con->prepare($sql[$count]) ;    /* execution des requets de recherche */
            $req->execute([
                'email' => $email , 
                'password' => $password  
            ]) ; 
            
            $result = $req->fetch(PDO::FETCH_ASSOC) ; 

            if (!empty($result)) {

                if($count == 0) {
                    $_SESSION['clientId'] = $result['id'] ; 
                    header('location:../view/UserAccount.php') ;  /* redirection vers la page de profile du client */

                } elseif($count == 1) {
                    $_SESSION['adminId'] = $result['id'] ; 
                    header('location:../back-office_/index.php') ;   /* redirection vers la page du profile de l'admin*/

                } elseif($count == 2) {
                    $_SESSION['entrepriseID'] = $result['id'] ; 
                    header('location:entrepriseProfil.php') ;  /* redirection vers la page du profile de l'entreprise */ 

                }
                
                

    
            } else {  /* dans le cas ou la variable result est vide */
                $error = "mot de passe ou adresse email incorrecte" ;   
            }
        }
    } else { /* si l'un des champs des saisie est vide */
        $error = "veuillez remplir tous les champs" ; 
    }
}


?>
