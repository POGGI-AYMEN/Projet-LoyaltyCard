
<?php 
include "../models/adminModel.php" ; 

if (isset($_SESSION['adminId'])) 
{
    $adminId = $_SESSION['adminId'] ; 

    $Admin = AdminModel::selectWhere("id" , $adminId) ; 

}

else 

{
    header('location:../view/error.php?message=403 Forbbiden') ; 
}
?>