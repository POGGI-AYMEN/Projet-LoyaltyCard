<?php 
include "../controllers/entreprise.php" ;
include "../controllers/admin.php" ; 


include "header.php" ;
?>

<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ajouter une entrepise</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <form method="post">
                            <th>Information</th>
                            <th>Valeur</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nom</td>
                            <td>
                                <input type="text" name="contrat" value=<?php echo $company['nom']; ?>>
                            </td> 
                        </tr>
                    <tr>
                        <td>
                        Email
                        </td>
                        <td>
                        <input type="text" name="email" value=<?php echo $company['email']; ?>>
                        </td> 
                    </tr>

                    <tr>
                        <td>
                        Numéro de téléphone
                        </td>
                        <td>
                        <input type="text" name="num" value=<?php echo $company['numéro_tel']; ?>>
                        </td> 
                    </tr>

                    <tr>
                        <td>
                        Gérant
                        </td>
                        <td>
                        <input type="text" name="gérant" value=<?php echo $company['gérant']; ?>>
                        </td> 
                    </tr>

                        <tr>
                            <td>Date de création</td>
                            <td>
                                <input type="text" name="contrat" value=<?php echo $company['date_de_création']; ?>>
                            </td> 
                        </tr>

                        <tr>
                            <td>Sécteur d'activité</td>
                            <td>
                                <input type="text" name="contrat" value=<?php echo $company['activité']; ?>>
                            </td> 
                        </tr>

                        <tr>
                            <td>Siret</td>
                            <td>
                                <input type="text" name="contrat" value=<?php echo $company['siret']; ?>>
                            </td> 
                        </tr>

                    <tr>
                        <td>Chiffre d'affaire</td>
                        <td>
                        <input type="text" name="chif_affaire" value=<?php echo $company['chiffre_daffaire']; ?>>
                        </td> 
                    </tr>

                    <tr>
                        <td>Durée de contrat</td>
                        <td>
                        <input type="text" name="contrat" value=<?php echo $company['contrat']; ?>>
                        </td> 
                    </tr>

                    <tr>
                        <td>Date du dernier payement</td>
                        <td>
                        <input type="text" name="date" value=<?php echo $company['date_de_payement']; ?>>
                        </td> 
                    </tr>      
                    </tbody>
                </table>
                <input id="editB" type="submit" class="btn btn-secondary" name="updateEntreprise" value="Ajouter">
            </div>
        </div>
    </form>
    </div>
</div>


<?php require('footer.php')?>