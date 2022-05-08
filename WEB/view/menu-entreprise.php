
<?php
include_once "../controllers/entreprise.php";
?>

<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<div class="mt-3">
									<h4><?php echo $entreprise['nom'] ;?></h4>
									<p class="text-secondary mb-1"><?php echo $entreprise['email']  ?></p>
									<p class="text-muted font-size-sm"><?php echo $entreprise['ville']  ?></p>
									
								</div>
							</div>
							<hr class="my-4">
							<?php require("item-list-entreprise.php"); ?>
						</div>
					</div>
				</div>