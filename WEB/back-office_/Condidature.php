<?php
include "../controllers/candidatur.php" ; 
include "../controllers/admin.php" ; 
require "header.php" ; 
$i = 0;

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
                   <?php foreach($candidat as $candidats){
                   ?>

                   
                    <tr>
                        
                        <td><?php echo $candidat[$i]['nom']  ?></td>
                        
                        <td><?php echo $candidat[$i]['email']  ?></td>
                        <td><?php echo $candidat[$i]['numéro_tel']  ?></td>
                        <td><?php echo $candidat[$i]['ville']  ?></td>
                        <td><?php echo $candidat[$i]['activité']  ?></td>
                        <td><?php echo $candidat[$i]['chiffre_daffaire']  ?></td>
                        <td><?php echo $candidat[$i]['catalog']  ?></td>
                        <td><a id="add" href="../controllers/candidatur.php?addEntreprise=<?php echo $candidat[$i]['email'] ;?>">Ajouter</a>   <a id="sup" href="../controllers/candidatur.php?deleteEntreprise=<?php echo $candidat[$i]['email']?>">Supprimer</a></td>
                

                    </tr>
                   
                   
                    <?php
                    $i++ ;
                   }
                    ?>
                </tbody>
               
            </table>
        </div>
    </div>
</div>

</div>



<?php 

require("footer.php");
?>