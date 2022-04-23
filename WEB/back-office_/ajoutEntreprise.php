<?php
session_start() ;

include "../controllers/entreprise.php" ;
include_once "../controllers/admin.php" ;


include "header.php" ;
?>

<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ajouter une entrepise</h6>
        </div>
        <p style="color:red; margin-left: 10%;"><?php if(!empty($error)) {echo  $error ;} ?></p>
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
                                <input type="text" class="form-control" name="entreprise" placeholder="nom">
                            </td> 
                        </tr>
                    <tr>
                        <td>
                        Email
                        </td>
                        <td>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                        </td> 
                    </tr>

                    <tr>
                        <td>
                        Numéro de téléphone
                        </td>
                        <td>
                        <input type="text" class="form-control" name="num" placeholder="Téléphone">
                        </td> 
                    </tr>

                        <tr>
                            <td>
                               Adresse
                            </td>
                            <td>
                                <input type="text" class="form-control" name="adress" placeholder="Adress">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Code Postal
                            </td>
                            <td>
                                <input type="text" class="form-control" name="code_postal" placeholder="code postal">
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>
                                Ville
                            </td>
                            <td>
                                <input type="text" class="form-control" name="ville" placeholder="ville">
                            </td>
                        </tr>
                        <tr>

                            <td>
                                Pays
                            </td>
                            <td>
                                <input type="text" class="form-control" name="pays" placeholder="Pays">
                            </td>
                        </tr>


                        <tr>
                        <td>
                        Gérant
                        </td>
                        <td>
                        <input type="text" class="form-control" name="gérant" placeholder="Gérant">
                        </td> 
                    </tr>

                        <tr>
                            <td>Date de création</td>
                            <td>
                                <input type="text" class="form-control" name="création" placeholder="Date de création">
                            </td> 
                        </tr>

                        <tr>
                            <td>Sécteur d'activité</td>
                            <td>
                                <input type="text" class="form-control" name="activité" placeholder="Sécteur">
                            </td> 
                        </tr>

                        <tr>
                            <td>Siret</td>
                            <td>
                                <input type="text" class="form-control" name="siret" placeholder="Siret">
                            </td> 
                        </tr>

                    <tr>
                        <td>Chiffre d'affaire</td>
                        <td>
                        <input type="text" class="form-control" name="chif_affaire" placeholder="chiffre d'affaire">
                        </td> 
                    </tr>

                    <tr>
                        <td>Durée de contrat</td>
                        <td>
                        <input type="text" class="form-control" name="contrat" placeholder="durée de contract">
                        </td> 
                    </tr>


                    </tbody>
                </table>
                <input id="editB" type="submit" class="btn btn-secondary" name="addNewEntreprise" value="Ajouter">
            </div>
        </div>
    </form>
    </div>
</div>


<?php require('footer.php')?>