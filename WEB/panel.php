<?php
session_start() ; 

include 'config/database.php' ; 

if (isset($_GET['error'])) 
{
    echo $_GET['error'] ; 
}

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

        <p class="price"><?php echo $total   ?></p>
        
        <a href="config/incrementArticle.php?article=<?php echo $result['article']  ?>&&quantity=<?php echo $result['quantité'] ?>" >ajouter</a>
        <br>
        <a href="config/decrementArticle.php?article=<?php echo $result['article']  ?>&&quantity=<?php echo $result['quantité'] ?>" >retirer</a>

        




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
<p>Somme total : </p>
<p id="totalSum"></p>


<button type="button" id="pay">Payer</button>



<script src="JS/cart.js"></script>