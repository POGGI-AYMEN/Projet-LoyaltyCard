<?php 
include "../controllers/client.php" ;

include "../controllers/messagerie.php" ; 

Messagerie::sendMessage() ; 


$messages = Messagerie::getClientMessages($_SESSION['clientId']) ;  


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
	<link rel="stylesheet" href="../css/messagrie.css">

   <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/UserAccount.css">
    <link rel="stylesheet" href="../css/user_footer.css"> 


    <title>Messagerie </title>
</head>
<body>
<?php require("navbar.php"); ?>
<br><br>


<div class="container__">
		<div class="main-body">
			<div class="row">
			<?php require("menu.php") ?>	
				<main class="content col-lg-8">
					<div class="container p-0">
						<div class="card">							
									<div class="py-2 px-4 border-bottom d-none d-lg-block">
										
									</div>
								<div class="position-relative">
										<div class="chat-messages p-4">
					

										<?php   
										
										foreach($messages as $message)

										if ($message['admin_message'] === "") 
										{
											echo 
											"
											<div class='chat-message-right pb-4 '>
											<div>
												<div class='text-muted small text-nowrap mt-2'>". date('j/n/Y h:m')."</div>
											</div>
											<div class='flex-shrink-1 bg-light rounded py-2 px-3 mr-3'>
												<div class='font-weight-bold mb-1'>Vous</div>
												".$message['message']."
											</div>
										</div>
						

											
											" ;
										}

										else
										{

											echo 
											"
											<div class='chat-message-left  pb-4 '>
											<div>
												<div class='text-muted small md-col-6 text-nowrap mt-2'>". date('j/n/Y h:m')."</div>
											</div>
											<div class='flex-shrink-1 bg-light rounded py-2 px-3 mr-3'>
												<div class='font-weight-bold mb-1'>LoyaltyBoost</div>
												".$message['admin_message']."
											</div>
										</div>
						

											
											" ;
										}


										?>
										
				
					
										</div>
									</div>
								<form method="post">
									<div class="flex-grow-0 py-3 px-4 border-top">
										<div class="input-group">
											<input name="message" type="text" class="form-control" placeholder="Type your message">
											<input name="send" type="submit" class="btn btn-primary"></input>
										</div>
									</div>
								</form>
								</div>
						</div>
					
				</main>
			</div>
		</div>
	</div>
</div>
<?php require("footer.php"); ?>
