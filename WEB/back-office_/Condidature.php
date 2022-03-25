<?php
session_start() ;
include "../config/database.php" ;  
if (isset($_SESSION['adminId'])) {
    $id = $_SESSION['adminId'] ; 
    $sql = "SELECT * FROM Admin WHERE id = ?" ; 
    $query = $con->prepare($sql) ; 
    $query->execute([$id]) ; 
    $Admin = $query->fetch(PDO::FETCH_ASSOC) ; 
    require("header.php");
    ?>


<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Candidatures</h1>
<style>

#add{
    color:blue;
    text-decoration:none;
    padding:5px;
    
}
#sup{
    color:red;
    text-decoration:none;
    padding:5px;

}

</style>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informations des entreprises</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Entreprise</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Ville</th>
                        <th>Sécteur</th>
                        <th>chiffre d'affire</th>
                        <th>Cataloge</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
    
                    $selectQuery = $con->prepare("SELECT * FROM Candidature") ; 

                    $selectQuery->execute() ; 

                    while($result = $selectQuery->fetch(PDO::FETCH_ASSOC))
                    {
                    ?>
                    <tr>
                        <td><?php echo $result['entreprise']  ?></td>
                        <td><?php echo $result['email']  ?></td>
                        <td><?php echo $result['telephone']  ?></td>
                        <td><?php echo $result['ville']  ?></td>
                        <td><?php echo $result['secteur']  ?></td>
                        <td><?php echo $result['chiffre_affaire']  ?></td>
                        <td><?php echo $result['catalog']  ?></td>
                        <td><a id="add" href="#">Ajouter</a>   <a id="sup" href="#" >Supprimer</a></td>

                    </tr>
                    <?php
                    
                    }
                    
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>



<?php 
}else header('location:../error.php?message=403 Forbidden') ;
require("footer.php");
?>