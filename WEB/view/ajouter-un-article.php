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
			<?php require("menu-entreprise.php") ;
            include_once "../controllers/entreprise.php";?>
			<div class="col-lg-8">
            <div class="container-fluid">
  <div class="card  mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Ajouter un article</h6>

      </div>
      <p style="color: red; margin-left: 2%;margin-top: 1%;"><?php if(!empty($error)) {echo $error;}  ?></p>
      <p style="color: green"><?php  if(!empty($suc)) {echo $suc ;} ?></p>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <form method="post" enctype="multipart/form-data">
                          <th>Nom</th>
                          <th>Information</th>
                        
                      </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>
                          Nom
                      </td>
                      <td>
                          <input type="text" class="form-control" name="article" style="width:80%; text-align:center; position:relative; left:10%;">
                      </td>
                  </tr>

                  <tr>
                      <td>
                          Prix
                      </td>
                      <td>
                          <input type="text" class="form-control" name="prix" style="width:80%; text-align:center; position:relative; left:10%;">
                      </td>
                  </tr>

                  <tr>
                      <td>Quantité en stock</td>
                      <td>
                          <input type="text" class="form-control" name="quantité" style="width:80%; text-align:center; position:relative; left:10%;">
                      </td>
                  </tr>

                  <tr>
                      <td>Description</td>
                      <td>
                          <input type="text" class="form-control" name="description" style="width:80%; text-align:center; position:relative; left:10%;">
                      </td>

                  </tr>
                  <tr>
                      <td>Catégorie</td>
                      <td>
                          <input type="text" class="form-control" name="catégorie" style="width:80%; text-align:center; position:relative; left:10%;">
                      </td>

                  </tr>

                  <tr>
                      <td>Photo d'article</td>
                      <td>
                          <input type="file"  name="photo" style="width:80%; text-align:center; position:relative; left:10%;">
                      </td>

                  </tr>
                  </tbody>
              </table>
              <input id="editB" type="submit" class="btn btn-secondary" name="addArticle" value="Ajouter">

              <a href="articles-mis-en-ligne.php" class="btn btn-primary">Retour</a>

          </div>
      </div>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
