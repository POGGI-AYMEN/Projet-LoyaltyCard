

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
        echo "veuillez remlire tous les champs" ; 
    }
}

?>


<form method="post"  enctype="multipart/form-data">

<input type="text" name="entreprise" placeholder="entreprise">
<br>
<input type="text" name="email" placeholder="email">
<br>
<input type="text" name="tel" placeholder="téléphone">
<br>
<input type="text" name="ville" placeholder="ville">
<br>
<input type="text" name="secteur" placeholder="secteur">
<br>
<input type="text" name="chiffre_aff" placeholder="chiffre d'affaire">
<br>
<input type="file" name="cataloge" placeholder="catalog">
<br>
<input type="submit" name="sub" placholder="envoyer">




</form>