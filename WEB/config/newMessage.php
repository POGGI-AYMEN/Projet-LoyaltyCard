<?php
include "../controllers/client.php" ;

$clientId = $_SESSION['clientId'] ;

include "../controllers/messagerie.php" ;

$newMessageCount = Messagerie::newMessageCount($clientId) ;

echo json_encode($newMessageCount) ;

if (isset($_GET['update']))
{
    if ($_GET['update'] === 'ok')
    {
        echo "ok" ;
        Messagerie::updateMessageCount($clientId) ;
    }
}