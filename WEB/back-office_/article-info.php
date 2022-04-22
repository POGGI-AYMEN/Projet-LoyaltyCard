<?php 
session_start() ;

include "../controllers/admin.php" ;
require("header.php");

include "../models/articleModel.php" ;

    $articles = ArticleModel::selectAll() ; 

      
      ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Information de l'article <strong><?php echo $result['nom']; ?></strong></h6>
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
                    <p><?php echo $article['codeArticle'] ; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>
                    Article
                    </td>
                    <td>
                    <p><?php echo $result['nom']; ?></p>
                    </td> 
                  </tr>
                  <tr>
                    <td>Prix</td>
                    <td> <p><?php echo $article['prix']; ?></p> </td> 
                  </tr> 
                  <tr>
                    <td>Catégorie</td>
                    <td> <p><?php echo $article['catégorie']; ?></p> </td> 
                  </tr> 

                  <tr>
                    <td>
                    Quantité
                    </td>
                    <td>
                    <p><?php echo $article['quantité']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>Description</td>
                    <td>
                    <p><?php echo  $article['Description']; ?></p>
                    </td> 
                  </tr>
                </tbody>
            </table>

            <a href="stockHandling.php" class="btn btn-primary mt-4"> Retour</a>
            
        </div>
    </div>
  </div>


  
 <?php require("footer.php"); ?>




