<?php 
include "../controllers/client.php" ;
?>

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
	<link rel="stylesheet" href="../css/messagerie.css">

   <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/UserAccount.css">
    <link rel="stylesheet" href=".../css/user_footer.css"> 
    <title>Historique des achats </title>
</head>
<body>
<?php require("navbar.php"); ?>
<br><br>


<div class="container__">
		<div class="main-body">
			<div class="row">
			<?php require("menu.php") ?>	
				<main class="content col">
					<div class="container__ p-0">
						<div class="card">							
									<div class="py-2 px-4 border-bottom d-none d-lg-block">
										
									</div>

									<div class="position-relative">
										<div class="chat-messages p-4">

											<div class="chat-message-right pb-4">
												<div>
													<div class="text-muted small text-nowrap mt-2">2:33 am</div>
												</div>
												<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
													<div class="font-weight-bold mb-1">Vous</div>
													Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
												</div>
											</div>

											<div class="chat-message-left pb-4">
												<div>
													<div class="text-muted small text-nowrap mt-2">2:34 am</div>
												</div>
												<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
													<div class="font-weight-bold mb-1">LoyaltyBoost</div>
													Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
												</div>
											</div>


										</div>
									</div>

									<div class="flex-grow-0 py-3 px-4 border-top">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Type your message">
											<button class="btn btn-primary">Send</button>
										</div>
									</div>

								</div>
						</div>
					
				</main>
			</div>
		</div>
	</div>
</div>
<?php require("footer.php"); ?>
