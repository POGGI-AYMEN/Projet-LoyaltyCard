
<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<div class="mt-3">
									<h4><?php echo $user['nom']."  ".$user['prenom'] ;  ?></h4>
									<p class="text-secondary mb-1"><?php echo $user['email']  ?></p>
									<p class="text-muted font-size-sm"><?php echo $user['ville']  ?></p>
									
								</div>
							</div>
							<hr class="my-4">
							<?php require("item_list.php"); ?>
						</div>
					</div>
				</div>