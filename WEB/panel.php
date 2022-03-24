<?php
session_start() ; 

include 'config/database.php' ; 

if (isset($_SESSION['clientId'])) 
{
    $clientId = $_SESSION['clientId'] ; 
    $selectQuery = $con->prepare("SELECT * FROM Panier WHERE client = ? ") ; 

    $selectQuery->execute([$clientId]) ; 

  
    while($result = $selectQuery->fetch(PDO::FETCH_ASSOC))
    {
        $total = $result['prix'] * $result['quantité'] ; 
       
    ?>
    <div>
        <p>Article :  <?php echo $result['article']  ?></p>
        <p> Catégorie : <?php echo $result['catégorie']  ?></p>

        <p>Prix :<?php echo $result['prix']  ?></p>
        <p>Quantité : <?php echo $result['quantité']  ?></p>

        <p id="price"> totale : <?php echo $total   ?> </p>


    </div>
    <br>

<?php
} 

}
else
{
    header('location:connexion.php') ; 
}

?>
<p id="totalSum">somme total : </p>

<form method="post">
<input type="submit" name="paye" placeholder="payer">
</form>


<script>

    sum = document.getElementById("price").innerHTML ; 
    console.log(sum)
</script>