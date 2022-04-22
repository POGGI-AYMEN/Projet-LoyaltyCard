var notificationId = document.getElementById('notif-id').textContent; 

console.log(notificationId);
function updateNotificationCount() 
{
    var xhr = new XMLHttpRequest() ; 
    xhr.open('get' , '../config/notificationCount.php?id='+String(notificationId) , true) ; 

    xhr.onreadystatechange = function() 
    {
        if (xhr.status === 200 && xhr.readyState === 4) 
        {
            console.log('updated') ; 
        }
    }
    xhr.send() ;
}

updateNotificationCount() ; 