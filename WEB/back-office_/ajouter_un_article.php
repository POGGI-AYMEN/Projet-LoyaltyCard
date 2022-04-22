<?php 
session_start() ;
include "../controllers/article.php" ; 
include_once "../controllers/admin.php" ; 

if (isset($_POST['articleCode'])) 
{
  $code = ArticleModel::generateCode() ; 

}

include "header.php" ;
?>

<style>

  .codeAr{
    display:flex;
    justify-content: space-between;
  }
</style>

<!-- DataTales Example -->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ajouter un produit </h6>
    </div>
    <p style="color:red;"><?php if(!empty($error)) echo $error; ?></p> 
        <p style="color:green;"><?php if(!empty($suc)) echo $suc; ?></p> 

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <form method="post" enctype="multipart/form-data">     
                        <th>Produit</th>
                        <th>Valeur</th>
                    </tr>
                </thead>
                <tbody>
                 

                  <tr>
                    <td>
                    Nom
                    </td>
                    <td>
                    <input type="text" name="article" style="width:80%; text-align:center; position:relative; left:10%;">
                    </td> 
                  </tr>

                  <tr>
                    <td>
                      Prix
                    </td>
                    <td>
                    <input type="text" name="prix" style="width:80%; text-align:center; position:relative; left:10%;">
                    </td> 
                  </tr>

                  <tr>
                    <td>Quantité en stock</td>
                    <td>
                    <input type="text" name="quantité" style="width:80%; text-align:center; position:relative; left:10%;">
                    </td> 
                  </tr>

                  <tr>
                    <td>Description</td>
                    <td>
                    <input type="text" name="description" style="width:80%; text-align:center; position:relative; left:10%;">
                    </td> 
                    
                  </tr>
                  <tr>
                    <td>Catégorie</td>
                    <td>
                    <input type="text" name="catégorie" style="width:80%; text-align:center; position:relative; left:10%;">
                    </td> 
                    
                  </tr>
                  <tr>
                    <td>Entrepots</td>
                    <td>
                      <select  style="width:80%; text-align:center; position:relative; left:10%;" name="entrepots">
                        <option selected disabled>Séléctionner un entrepots</option>
                        <option value="site 1">Site 1</option>
                        <option value="site 2">Site 2</option>
                        <option value="site 3">Site 3</option>
                        <option value="site 4">Site 4</option>
                        <option value="site 5">Site 5</option>

                      </select>
                    </td> 
                    
                  </tr>
                  <tr>
                    <td>Photo d'article</td>
                    <td>
                    <input type="file" name="photo" style="width:80%; text-align:center; position:relative; left:10%;">
                    </td> 
                    
                  </tr>


                    
                </tbody>
            </table>
            <input id="editB" type="submit" class="btn btn-secondary" name="newArticle" value="Ajouter">
        </div>
    </div>
</form>
</div>
</div>


  
<?php
require("footer.php");
?>
