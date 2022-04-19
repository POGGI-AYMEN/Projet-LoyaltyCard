<?php

include "../controllers/client.php" ;
$facture = $_GET['facture'] ; 
$amount = $_GET['amount'] ; 

$newPoints = $amount * 0.3 ; 

$usedPoints = $_GET['points'] ; 

include "../models/historiqueModel.php" ; 

$articls = historiqueModel::selectWhereFacture($facture) ;

include "../controllers/carte.php" ; 

$points = Cart::getPoints($user['num_carte']) ; 

ob_start() ; 
?>


<page>

<style>
 img {
  height: 100px ; 
  width: 100px;
 }

 .header {
  position: absolute;
  top: 12%;
  padding: 0px;
 }
 .header div {
  font-size: 15px;
  padding: 2px;
 }
 .info div {
   font-size: 15px;
  padding: 2px;
 }
 .info{
  position: absolute;
  left: 70%;
  top: 2%;

 }
 h1{
  position: absolute;
  top: 25%;
  text-align: center;
  text-decoration: underline;
  font-weight: bold;
 }
 h3{
  text-decoration: underline;
  font-weight: bold;
 }
 
 table{
  width: 100%;
 }
 td{
  font-size: 18px;
 }
</style>



<img src="../images/logo.png">
<div class="header">
<div style="font-weight: bold;">vos info:</div>
<div>date : <?php echo date('j/n/Y'); ?> </div>
<div>client : <?php include_once "../controllers/client.php"; echo $user['nom']." ".$user['prenom']; ?></div>
<div>Identifiant client : <?php echo $_SESSION['clientId']; ?></div>
<div>identifiant facture : <?php  echo $facture; ?></div>
</div>

<div class="info">
  <div>Loyalty Boost</div>
  <div>Adresse : XXXXX</div>
  <div>Email:loyaltycard6@gmail.com</div>
  <div>Téléphone : 0781878843</div>
</div>
<h1>Facture</h1>

<h3>Articles</h3>


<?php 

  for ($i = 0 ; $i < count($articls) ; $i++) 
  {

?>
<hr>
<table>
  <tr>
    <td style="width: 33%;"><?php echo $articls[$i]['article']; ?></td>
    <td style="width: 33%;" ><?php echo $articls[$i]['quantité']; ?>  </td>
    <td style="width: 33%;"><?php echo $articls[$i]['prix']; ?> €</td>
  </tr>

</table>
<hr>
<?php
}
?>


</page>
<h4>total : <?php echo $amount; ?> €</h4>
<br>
<br>
<br>
<br>
<br>
<br>
<h5>Points utilisé :     <?php echo $usedPoints; ?></h5>

<h5>Points gagner :      <?php echo $newPoints; ?></h5>

<h5>Votre nouveau solde des points : <?php echo $points['points']; ?></h5>
<br><br><br><br><br><br><br>
<h2 style="text-align:center; ">Equipe Loyalty Boost</h2>

<?php
include "../config/database.php" ; 

$insetQuery = $con->prepare("INSERT INTO Factures (facture_code	,client_id	,nom	,prenom	,date) VALUES (? , ? , ? , ? , ?)") ; 


$date = date('j/n/Y') ;

$insetQuery->execute([
  $facture,
  $_SESSION['clientId'] ,
  $user['nom'] , 
  $user['prenom'],
  $date
]) ;


require_once "../library/vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;

$content = ob_get_clean() ; 
$html2pdf = new Html2Pdf();
$pdf = new HTML2PDF('p' , 'A4' , 'fr') ; 
$pdf->writeHTML($content) ; 
$pdf->Output('/opt/lampp/htdocs/WEB/uploads/factures/facture_'.$facture.'.pdf','F') ;

header('location:../view/success.php?facture='.$facture) ; 





?>