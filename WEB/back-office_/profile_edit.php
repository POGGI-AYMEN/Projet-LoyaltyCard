
<?php 
include "../config/database.php";


$sqlQuery = 'SELECT * FROM Admin';
$AdminStatement = $con->prepare($sqlQuery);
$AdminStatement->execute();
$Admin = $AdminStatement->fetch();

$firstname = $Admin["prenom"];
$name = $Admin["nom"];
$email = $Admin["email"];
$newPassword = $Admin["mdp"];
$confirmPassword = $Admin["mdp"];
$ancientPassword = $Admin["mdp"];



if(!isset($_POST['submit']) and $_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isempty($_POST['ancient_password'])) {
        if(($_POST['ancient_password']) == "lyes" ) {
            if(!empty($_POST['first_name'])){
                $firstname = $_POST['first_name'];
            }else{ $firstname = $firstname;}

            if(!empty($_POST['name'])){
                $name = $_POST['name'];
            }else{ $name =$name;}

            if(!empty($_POST['email'])){
                $email = $_POST['email'];
            }else{ $email = $email;}

            if(!empty($_POST['new_password'])){
                if($_POST['new_password'] == $_POST['confirm_password']){
                    $ancientPassword = $_POST['new_password'];

                }else{$error = "les mots de passe ne sont pas identiques ";}

            }else{ $ancientPassword = $ancientPassword;}

        }else{  $error = "Le mot de passe est faux ! Veuille reesayer ";}

    }else{
        $error = "Veuille entrer l'ancien mot de passe";
    }
    
}
try {
    $sql = "UPDATE Admin SET nom=?, prenom=?, email=?, mdp=? ";
    $stmt= $con->prepare($sql);
    $stmt->execute([$name, $firstname, $email, $newPassword]);
    return true;    
        } catch(PDOException $e) {
            $e->getMessage();
        }



?>
<?php require('header.php')?>
              
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold"><?= $Admin["nom"]?></span>
                    <span class="text-black-50"> <?= $Admin["email"]?></span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-4 py-6">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="#" method="post" class="form" >
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Prenom</label><input type="text" name ="first_name" class="form-control" placeholder="Prenom" value=""></div>
                            <div class="col-md-6"><label class="labels">Nom</label><input type="text" name ="name" class="form-control" value="" placeholder="Nom"></div>
                        </div> 
                    
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Numero de telephone</label><input type="text" name ="phone_number" class="form-control" placeholder="Numero de telephone" value=""></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="text" name ="email" class="form-control" placeholder="Email" value=""></div>
                            <div class="col-md-12"> <label class="labels">Mot de passe</label>
                             <input type="password" name ="new_password" class="form-control" placeholder="Nouveau mot de passe" value=""></div>
                            <div class="col-md-12  mt-3"> <input type="password" name ="confirm_password" class="form-control" placeholder="Confirmer mot de passe" value=""></div>
                            <div class="col-md-12 mt-3"> <label class="labels">Ancien mot de passe *</label><input name ="ancient_password" type="password" class="form-control" placeholder="Ancien mot de passe" value=""></div>
                        </div> 
                        <input type="submit" class="btn btn-primary profile-button mt-5 text-center" name="submit" value="Sauvgarder">

                    </form>   
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

 
 
    <?php require('footer.php')?>