<?php
session_start() ;
include "../config/database.php" ;  
if (isset($_SESSION['adminId'])) {
    $id = $_SESSION['adminId'] ; 
    $sql = "SELECT * FROM Admin WHERE id = ?" ; 
    $query = $con->prepare($sql) ; 
    $query->execute([$id]) ; 
    $Admin = $query->fetch(PDO::FETCH_ASSOC) ; 
    require("headr.php");
    ?>


<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Candidatures</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informations des entreprises</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>



<?php 
}else header('location:../error.php?message=403 Forbidden') ;
require("footer.php");
?>