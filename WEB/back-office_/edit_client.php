<?php
session_start() ;

include "../controllers/admin.php" ; 
include_once "../models/clientModel.php" ;



$client = ClientModel::selectWhere("id" , $_GET['id']) ;

include "header.php" ;
?>

<!-- DataTales Example -->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modifier les information du client</h6>
    </div>
    <p style="color: red;margin-left: 10%;margin-top: 1%;"><?php if(isset($_GET['error'])) echo $_GET['error'];?></p>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <form method="post" action="../controllers/client.php?id=<?php echo $_GET['id'] ;?>">
                        <th>Information</th>
                        <th>Update</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Nom </td>
                        <td>
                            <input type="text" class="form-control" name="nom" value="<?php  echo $client['nom'] ?>">
                        </td> 
                    </tr>

                    <tr>
                        <td> Prenom </td>
                        <td>
                            <input type="text" class="form-control" name="prenom" value="<?php  echo $client['prenom'] ?>">
                        </td> 
                    </tr>

                    <tr>
                        <td> Email </td>
                        <td>
                            <input type="text" class="form-control" name="email" value="<?php  echo $client['email'] ?>">
                        </td> 
                    </tr>

                  <tr>
                    <td>
                       Numéro de téléphone
                    </td>
                    <td>
                        <input type="text" class="form-control" name="phone" value="<?php  echo $client['num_tel'] ?>">
                    </td> 
                  </tr>

                  <tr>
                    <td>Adresse</td>
                    <td>
                        <input type="text" class="form-control" name="adress" value="<?php  echo $client['adresse'] ?>">
                    </td> 
                  </tr>

                  <tr>
                    <td>Ville</td>
                    <td>
                        <input type="text" class="form-control" name="ville" value="<?php  echo $client['ville'] ?>">
                    </td> 
                  </tr>

                  <tr>
                    <td>Code postal</td>
                    <td>
                        <input type="text" class="form-control" name="code_postal" value="<?php  echo $client['code_postal'] ?>">
                    </td> 
                  </tr>      
                </tbody>
            </table>
            <input id="editB" type="submit"  class="btn btn-secondary" name="editClient" value="Modifier">
            <a href="gestion_client.php" class="btn btn-primary">Retour</a>
        </div>
    </div>
</form>
</div>
</div>


  
<?php
require("footer.php");
?>
