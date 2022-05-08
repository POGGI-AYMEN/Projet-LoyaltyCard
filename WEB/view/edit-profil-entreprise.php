

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
    <title>Edit profil entreprise </title>
</head>
<body>
<?php require("header-entreprise.php"); ?>
<br><br>


<div class="container__">
	<p style="color:red;"><?php if(!empty($error)) { echo $error; } ?></p>
		<div class="main-body">
			<div class="row">
			<?php require("menu-entreprise.php") ?>

				<div class="col-lg-8">
                <h2 class="text-center"> Modifier les information de l'entreprise</h2>
                    <br>
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nom</h6>
									<form method="post">
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="nom" type="text" class="form-control" value="<?php echo $user['nom'] ;?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input  name="email"  type="email" class="form-control" value="<?php echo $user['email'] ;?>">
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Telephone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="phone" type="text" class="form-control"value="<?php echo $user['num_tel'] ;?>">
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Gérant</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="adress" type="text" class="form-control" value="<?php echo $user['adresse'] ;?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Date de création</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="ville" type="text" class="form-control" value="<?php echo $user['ville'] ;?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Siège sociale</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="code_postal" type="text" class="form-control" value="<?php echo $user['code_postal'] ;?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Secteur d'activité</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="pays" type="text" class="form-control" value="<?php echo $user['pays'] ;?>">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Siret</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="pays" type="text" class="form-control" value="<?php echo $user['pays'] ;?>">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Chiffre d'affaire de l'année 2022</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="pays" type="text" class="form-control" value="<?php echo $user['pays'] ;?>">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Durée de contrat</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input name="pays" type="text" class="form-control" value="<?php echo $user['pays'] ;?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input name="save" type="submit" class="btn btn-primary px-4" value="Enregistrer">
								</div>
                                
</form>
							</div>
						</div>
					</div>
			</div>
		</div>
</div>
</div>

<?php require("footer.php"); ?>
<?php 

