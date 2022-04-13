/**
 * calcule de la somme total des produit dans le panier
 */

var prices = document.getElementsByClassName('price') ;   // on récuper les prix de tous les article

var articls = document.getElementsByClassName("articles") ; 

var sum = 0 ; 

for (let i = 0 ; i < prices.length ; i++) 
{
  
    var price = parseInt(prices[i].innerHTML , 10) ; 

    sum = sum + price ; 

    console.log(price);

    
}
var articleSum = 0
for (let j = 0 ; j < articls.length ; j++ ) 
{
   var article = parseInt(articls[j].innerHTML , 10) ; 
   
   articleSum = articleSum + article ; 
}

 document.getElementById('totalSum').innerHTML = String(sum) ; // on transforme le résultat en string pour qu'on puisse l'afficher a la page en HTML 
document.getElementById('articleNumber').innerHTML = String(articleSum) ;
var checkout =  document.getElementById('pay') ; 

checkout.onclick = function()
{
window.location.href = "payement.php?prix="+String(sum) ;  // redirection a la page de payement avec le prix en paramettre 
}

