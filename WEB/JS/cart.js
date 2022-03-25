/**
 * calcule de la somme total des produit dans le panier
 */

var prices = document.getElementsByClassName('price') ;   // on récuper les prix de tous les article

var sum = 0 ; 

for (let i = 0 ; i < prices.length ; i++) 
{
    var price = Number(prices[i].innerHTML) ;   // on additione tous les somme 
    sum = price + sum ;   

}
 document.getElementById('totalSum').innerHTML = String(sum) ; // on transforme le résultat en string pour qu'on puisse l'afficher a la page en HTML 

var checkout =  document.getElementById('pay') ; 

checkout.onclick = function()
{
window.location.href = "payement.php?prix="+String(sum) ;  // redirection a la page de payement avec le prix en paramettre 
}

