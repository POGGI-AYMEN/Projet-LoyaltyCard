<?php

session_start() ;

include "../controllers/admin.php" ; 

include "../models/articleModel.php" ;

    $articles = ArticleModel::selectAll() ; 

    require("header.php");
    ?>

    <style>
        .actions{
            display:flex;
            justify-content:space-between;
        }
        .actions a{
            margin-left:15px;
           
        }

    </style>


<div class="container-fluid">
    <div class="d-flex justify-content-between">
	    <h1 class="h3 mb-2 text-gray-800">Articles</h1>
        <h1 class="h3 mb-3 text-gray-800 btn"> <a href="ajouter_un_article.php"> Ajouter un article</a></h1>
    </div>
   	<div class="container">
       <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informations des entreprises</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Article</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Quantité</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    
                        <?php  foreach($articles as $article) { ?>
                    <td>
                    <form method="post" action="../controllers/article.php?code=<?php echo $article['codeArticle'] ?>">
                       <p><?php echo $article['codeArticle'] ;  ?></p>
						</td>
                        <td>
                            <p><?php echo $article['nom'] ;  ?></p>
						</td>
                        <td>
                            <input type="text" class="form-control" name="prix" value="<?php echo $article['prix'] ?>">
						</td>
                        <td>
                        <input type="text" class="form-control" name="catégorie" value="<?php echo $article['catégorie'] ?>">

						</td>
                        <td>
                        <input type="text" class="form-control" name="quantité" value="<?php echo $article['quantité'] ?>">

						</td>
                        <td>
                        <input type="text" class="form-control" name="Description" value="<?php echo $article['Description']; ?>">

                        </td>
                        <td class="actions">
                            <input class="btn btn-primary" name="submit" type="submit" value="enregistrer">
                            <a class="btn btn-danger" href="../controllers/article.php?removeArticle=<?php echo $article['codeArticle'] ?>">Supprimer</a>
                        </td>
                    </tr>
                    </form>
                    <?php } ?>
                       
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
		
	</div>
			</div>

   		

  

<?php

require("footer.php");
?>
   </html>




