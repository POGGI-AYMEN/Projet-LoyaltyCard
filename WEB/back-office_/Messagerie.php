<?php
    require("header.php");
    ?>

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Messagerie</h1>
    <main class="content col-lg-12">
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
											<div class='flex-shrink-1 bg-light col-md-6 rounded py-2 px-3 mr-3'>
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
												<div class='text-muted small text-nowrap mt-2'>". date('j/n/Y h:m')."</div>
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
                                        <a href="Entreprise-a-contacter.php" class="btn btn-primary mt-3">Retour</a>
									</div>
								</form>
								</div>
						</div>
					
				</main>
   
</div>

   		

  

<?php

require("footer.php");
?>
   </html>




