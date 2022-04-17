<?php
$i = 0 ;
include "../controllers/entreprise.php" ;
include "../controllers/admin.php" ; 

    require("header.php");
    ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between">
	    <h1 class="h3 mb-2 text-gray-800">Articles</h1>
        <h1 class="h3 mb-3 text-gray-800 btn"> <a href="ajouter_un_article.php"> Ajouter un article</a></h1>
    </div>
   	<div class="container">
   		<?php 
           
			foreach($companys as $company) {
		?>

		

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">liste des articles</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Supprimer</th>
                        <th>Modifier</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>
							<a href="infoEntreprise.php?id=<?php echo $companys[$i]['id']; ?>"><?php echo $companys[$i]['id']. "  ".$companys[$i]['nom']; ?></a>
						</td>
                        <td>
							<a href="infoEntreprise.php?id=<?php echo $companys[$i]['id']; ?>"><?php echo $companys[$i]['id']. "  ".$companys[$i]['nom']; ?></a>
						</td>
                        <td>
							<a id="delete" href="../controllers/entreprise.php?removeCompany=<?php echo $companys[$i]['id']; ?>">Supprimer</a>
						</td>
                        <td>
							<a id="edit" href="editeEntrprise.php?editEmail=<?php echo $companys[$i]['email']; ?>">Modifier</a>
						</td>
                        <td>
							<a id="contact" href="messageEntreprise.php?id=<?php echo $companys[$i]['id']; ?>">Contact</a>
						</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
		<?php }
        $i++ ?>

	</div>
			</div>

   		

  

<?php

require("footer.php");
?>
   </html>




