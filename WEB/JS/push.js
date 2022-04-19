
function showNotification() 
{
    const notification = new Notification("vous avez effecture un achat chez Loyalty Boost" , {
        body: "consulter votre nouveau solde des points",
        icon:"../images/logo.png"
    }) ; 

    notification.onclick = (e) =>
    {
        window.location.href = "../view/notifications.php" ; 
    } ;
}

if (Notification.permission === 'granted') 
{
    showNotification() ; 
} 
else if (Notification.permission !== 'denied') 
{
    Notification.requestPermission().then(permission => {
        if (Notification.permission === 'granted') 
        {
            showNotification() ; 
        }
    }) ;
}

