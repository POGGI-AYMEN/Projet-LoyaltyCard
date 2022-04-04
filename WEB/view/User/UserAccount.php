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
<link rel="stylesheet" href="../../back-office_/css/sb-admin-2.css">
   <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/UserAccount.css">
    <link rel="stylesheet" href="../../css/user_footer.css"> 
    <title>Profil utilisateur </title>
</head>
<body>
<?php require("navbar.php"); ?>
<br><br>


<div class="container__">
		<div class="main-body">
			<div class="row">
				<?php require("menu.php") ?>
				<div class="col-lg-8">
				
					<div class="row">


						<div class="col-xl-4 col-md-6 mb-6">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											Points</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-calendar fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="col-xl-4 col-md-6 mb-6">
							<div class="card border-left-success shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
											Articles achetés</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
										</div>
										<div class="col-auto">
										<i class="fa-solid fa-cart-arrow-down"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6 mb-6">
							<div class="card border-left-warning shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
											Vos points en euros</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-euro-sign fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
			</div>
		</div>
</div>

    <?php require("../footer.php"); ?>
