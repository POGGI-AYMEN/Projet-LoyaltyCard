<?php
session_start() ;
include "../config/database.php" ;  
if (isset($_SESSION['adminId'])) {
    $id = $_SESSION['adminId'] ; 
    $sql = "SELECT * FROM Admin WHERE id = ?" ; 
    $query = $con->prepare($sql) ; 
    $query->execute([$id]) ; 
    $Admin = $query->fetch(PDO::FETCH_ASSOC) ; 
    require("header.php");
    ?>

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Entreprise</h1>
   	<div class="container">
   		<?php 
			$sql_ = "SELECT * FROM Entreprise" ; 
			$requette = $con->prepare($sql_) ; 
			$requette->execute() ; 
			while ($resultat = $requette->fetch(PDO::FETCH_ASSOC)) {	
		?>

		

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Gestions des entreprises</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Supprimer</th>
                        <th>Modifier</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
							<a href="infoEntreprise.php?id=<?php echo $result['id']; ?>"><?php echo $resultat['id']. "  ".$resultat['nom']; ?></a>
						</td>
                        <td>
							<a id="delete" href="deleteEntreprise.php?id=<?php echo $resultat['id']; ?>">Supprimer</a>
						</td>
                        <td>
							<a id="edit" href="editeEntrprise.php?id=<?php echo $resultat['id']; ?>">Modifier</a>
						</td>
                        <td>
							<a id="contact" href="messageEntreprise.php?id=<?php echo $resultat['id']; ?>">Contact</a>
						</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
		<?php } ?>

	</div>
			</div>

   		

  

<?php }else header('location:../error.php?message=403 Forbidden') ;

require("footer.php");
?>
   </html>




