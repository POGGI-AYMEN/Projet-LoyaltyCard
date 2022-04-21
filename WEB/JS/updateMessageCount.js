function updateMessageCount()
{
    var xhr = new XMLHttpRequest() ;
    xhr.open('get' , '../config/newMessage.php?update=ok' , true) ;

    xhr.onreadystatechange = function()
    {
        if (xhr.status === 200 && xhr.readyState === 4)
        {
            console.log('updated') ;
        }
    }
    xhr.send() ;
}

updateMessageCount() ;