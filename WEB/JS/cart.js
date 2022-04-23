// calcule de la somme des article acheter //

var prices = document.getElementsByClassName('price') ;   // on récuper les prix de tous les article

var articls = document.getElementsByClassName("articles") ; 

var sum = 0 ; 

for (let i = 0 ; i < prices.length ; i++) 
{
  
    var price = parseFloat(prices[i].innerHTML) ; 

    sum = sum + price ; 


    
}
var articleSum = 0
for (let j = 0 ; j < articls.length ; j++ ) 
{
   var article = parseInt(articls[j].innerHTML) ; 
   
   articleSum = articleSum + article ; 
}

 document.getElementById('totalSum').innerHTML = String(sum) ; // on transforme le résultat en string pour qu'on puisse l'afficher a la page en HTML 
document.getElementById('articleNumber').innerHTML = String(articleSum) ;
var checkout =  document.getElementById('payment') ; 


// utilisation des points de l'utilisateur 

var fixedSum = 0 ;  // prix a payer aprés si le client utilise ses point pour réduire le prix original 

var useMyPoints = document.getElementById('use') ; 

var pointsInput = document.getElementById('points') ; 
var pointValue = 0 ; 
useMyPoints.onclick = function() 
{
     pointValue = Number(pointsInput.value) ; 
     
    
    var xhr = new XMLHttpRequest() ;          // on vérifier si le client posede le nombre des points entrer dans l'inpute
    
   xhr.open('get' , '../config/points.php' , true) ; 

   xhr.onreadystatechange = function() 
   {
       if (xhr.readyState === 4 && xhr.status === 200) 
       {

           var points = Number(xhr.responseText) ; 
           if (points < pointValue) 
           {
               var errorMessage = document.getElementById('error') ;    // on affiche un message d'erreur si non 
               errorMessage.innerHTML = "Vous avez pas assez de point dans votre compte " ;

             
           }
           else 
           {
               var euroValue = pointValue * 0.2 ; 

               console.log(euroValue) ;

               var newSum = sum - euroValue ;
                fixedSum = newSum.toFixed(2) ;     // on calcule la somme a payer aprés les réduction 
               
               document.getElementById('error').innerHTML = "" ; 
               document.getElementById('totalSum').innerHTML = String(fixedSum)  ; 

               //document.getElementById('totalSum') = 
           }
       }
   }

   xhr.send() ; 
}



checkout.onclick = function()    
{
    if (fixedSum === 0) 
    {
window.location.href = "payement-page.php?amount="+String(sum)+"&&points=0" ;        // si le client n'a pas utiliser des points
    }
    else 
    {
        window.location.href = "payement-page.php?amount="+String(fixedSum)+"&&points="+pointValue ;    // si le client a utilisé des points 
    }
}

