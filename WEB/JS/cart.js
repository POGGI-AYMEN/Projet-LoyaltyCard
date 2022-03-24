var prices = document.getElementsByClassName('price') ; 

var sum = 0 ; 

for (let i = 0 ; i < prices.length ; i++) 
{
    var price = Number(prices[i].innerHTML) ; 
    sum = price + sum ;  

}
 document.getElementById('totalSum').innerHTML = String(sum) ; 

var checkout =  document.getElementById('pay') ; 

checkout.onclick = function()
{
window.location.href = "payement.php?prix="+String(sum) ;
}

