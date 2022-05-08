<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
    <link rel="stylesheet" href="../back-office_/css/sb-admin-2.css">
    <link rel="stylesheet" href="../css/header-entreprise.css">
    <link rel="stylesheet" href="../css/profil-entreprise.css">
    <link rel="stylesheet" href="../css/footer-entreprise.css"> 
    <title>Profil Entreprise </title>
</head>
<body>
<?php require("header-entreprise.php"); ?>
<br><br>


<div class="container__">
	<div class="main-body">
		<div class="row">
			<?php require("menu-entreprise.php") ?>
			<div class="col-lg-8">
           
            <h2 class="text-center"> Prestations</h2>
                    <br>
                <div class="container">
                    <div class="card mb-4">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gestions des Articles</h6>
                            <a href="ajouter-une-prestation.php" class="btn btn-primary float-right">Ajouter une prestation</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom du service</th>
                                           
                                        </tr>
                                    </thead>        
                                    <tbody>
                                        <tr>             
                                            <td>
                                                <a href="modifier-supprimer-prestation.php">Voyage a barcelone</a>
                                            </td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        
        </div>
    </div>
</div>
</div>
<?php require("footer.php") ?>
