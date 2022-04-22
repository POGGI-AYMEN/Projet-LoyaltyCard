<?php 

include "../controllers/client.php" ; 

if (isset($_GET['fileName']) && !empty($_GET['fileName'])) 
{
    $fileName = basename($_GET['fileName']) ; 

    $filePath = "../uploads/factures/facture_".$fileName.".pdf" ;

    if (file_exists($filePath)) 
    {
        
        header("Content-type:application/pdf");

        
        header("Content-Disposition:attachment;filename=  facture.pdf  ");
        
        
        readfile($filePath);
		
        header('location:../view/success.php') ; 
    }

    else
    {
      header("location:../view/error.php?message=ce fichier n'existe pas") ;
    }

}