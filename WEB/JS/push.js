
var messageCount = document.getElementById('messageCount').innerHTML ;

var notifCount = document.getElementById('count').innerHTML ;



function showNotifications()
{
    if (messageCount > 0)
    {
        const notification = new Notification("Vous avez un nouvau message de LoyaltyBoost" , {
            body: "Nouveau message",
            icon:"../images/logo.png"
        }) ;
        notification.onclick = (e) =>
        {
            window.location.href = "../view/messagerie.php" ;
        } ;
        return true ;
    }
    if (notifCount > 0)
    {
        const notification = new Notification("Vous avez un nouvau message de LoyaltyBoost" , {
            body: "Nouveau message",
            icon:"../images/logo.png"
        }) ;
        notification.onclick = (e) =>
        {
            window.location.href = "../view/messagerie.php" ;
        } ;

    }

}
if (Notification.permission === 'granted') 
{
    showNotifications() ;
} 
else if (Notification.permission !== 'denied') 
{
    Notification.requestPermission().then(permission => {
        if (Notification.permission === 'granted') 
        {
            showNotifications() ;
        }
    }) ;
}

