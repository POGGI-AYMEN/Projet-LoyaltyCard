

<?php

include 'conifg/database.php' ; 

if (isset($_POST['sub']))
{
    if (isset($_POST['entreprise']) && !empty($_POST['entreprise'])&& isset($_POST['email']) && !empty($_POST['email']) &&isset($_POST['tel']) && !empty($_POST['tel'])
    && isset($_POST['ville']) && !empty($_POST['ville']) && isset($_POST['secteur']) && !empty($_POST['secteur']) && isset($_POST['chiffre_aff']) && !empty($_POST['chiffre_aff'])
     && isset($_POST['cataloge']) && !empty($_POST['catalog'])) 
    {
    }
    else
    {
        echo "veuillez remlir tous les champs" ; 
    }
}
require("header.php")

?>


    <form method="post" class="w-50 mx-auto mt-5"  enctype="multipart/form-data">
        <input class="form-control" type="text" name="entreprise" placeholder="entreprise">
        <br>
        <input class="form-control" type="text" name="email" placeholder="email">
        <br>
        <input class="form-control" type="text" name="tel" placeholder="téléphone">
        <br>
        <input class="form-control" type="text" name="ville" placeholder="ville">
        <br>
        <input class="form-control" type="text" name="secteur" placeholder="secteur">
        <br>
        <input class="form-control" type="text" name="chiffre_aff" placeholder="chiffre d'affaire">
        <br>
        <input class="form-control" type="file" name="cataloge" placeholder="catalog">
        <br>
        <input class="btn btn-primary " type="submit" name="sub" placholder="envoyer">
    </form>


<!-- get the footer -->
<?php
require("footer.php")
?>