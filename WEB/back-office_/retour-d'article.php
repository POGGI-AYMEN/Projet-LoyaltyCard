<?php
session_start() ;
require("header.php");
include "../models/articleModel.php" ;

include "../models/clientModel.php" ;

$articles = ArticleModel::selectReturn() ;


?>

<style>
    img{
        width: 100px;
        height: 60px;
       margin-left: 20px;
    }

</style>
<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Retour d'article</h1>
   	<div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Retour d'article</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
        
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Code de retour</th>
                                <th>Article</th>
                                <th>client</th>
                                <th>Facture</th>
                                <th>date de demande</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <?php  foreach ($articles as $article) { $client = ClientModel::selectWhere('id' , $article['client']) ; $clientName = $client['nom']." ".$client['prenom'] ?>
                        <tbody>
                            <tr>                  
                                <td>
                                    <?php echo $article['code'] ; ?>
                                </td>
                                <td>
                                  <img height="50px" width="2px" src="../uploads/images/<?php echo $article['photo'] ?>"><p style="text-align: center"><?php echo $article['article'] ;?></p>
                                </td>
                                <td>
                                    <?php echo $clientName ; ?>
                                </td>
                                <td>
                                    <a href="../config/download.php?fileName=<?php echo $article['facture'] ?>"><img src="../images/pdf.svg"></a>
                                </td>
                                <td>
                                    <?php  echo $article['date_de_demande']?>
                                </td>

                                <td>
                                    <a href="../controllers/article.php?returned=<?php echo $article['facture']  ?>&&client=<?php echo $article['client']?>" class="btn btn-primary">Accepter</a>
                                    <a href="../controllers/article.php?canc=<?php echo $article['facture']  ?>&&client=<?php echo $article['client']?>" " class="btn btn-danger">Refuser</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>
		
<?php require("footer.php"); ?>





