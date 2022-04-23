<?php
session_start() ;

include_once "../controllers/admin.php" ;

include "../models/clientModel.php" ;


$client = ClientModel::selectWhere("id" , $_GET['id']) ;

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/gestion_entreprise.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Information des clients</title>
</head>
<?php if (isset($_SESSION['adminId'])) { ?>

<body>


<?php  include "header.php" ;  ?>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Information du Client <strong><?php echo  $client['nom']." ".$client['prenom'] ; ?></strong></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>

                    <th>Nom</th>
                    <th>Information</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        <p><?php echo $client['id']; ?></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        NOM
                    </td>
                    <td>
                        <p><?php echo $client['nom']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td> <p><?php echo $client['email']; ?></p> </td>
                </tr>
                <tr>
                    <td>TELEPHONE</td>
                    <td> <p><?php echo $client['num_tel']; ?></p> </td>
                </tr>
                <tr>
                    <td>ADRESSE</td>
                    <td> <p><?php echo $client['adresse']; ?></p> </td>
                </tr>
                <tr>
                    <td>CODE POSTAL</td>
                    <td> <p><?php echo $client['code_postal']; ?></p> </td>
                </tr>
                <tr>
                    <td>NUMERO DE CARTE</td>
                    <td> <p><?php echo $client['num_carte']; ?></p> </td>
                </tr>


                </tbody>
            </table>

        </div>
    </div>
</div>

<?php }else { header('location:../error.php?message=403 Forbbiden') ;} ?>






