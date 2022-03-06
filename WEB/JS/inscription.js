/* fonction de génération d'un code */

function makeCode(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   return result;
}


var verifCode = makeCode(5) ;        /* création de code de verifcation de compte*/

 /************** premiere étape *******************/



var next_1 = document.getElementById('next_1') ;   

next_1.onclick = function() {

/* déclaration des variables*/

    var name = document.getElementById('name').value ;
    var lastName = document.getElementById('lastName').value ;
    var email = document.getElementById('email').value ;
    var password = document.getElementById('password').value ;
    var confirmation = document.getElementById('confirmation').value ;
    var error_1 = document.getElementById('error-1') ;
    var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/ ;
    var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/ ;


/* verification des champs de saisie */

    if (name === "" || lastName === "" || email === "" || password === "" || confirmation === "") {
        error_1.innerHTML = "veuillez remplir tous les champs " ;
        return ;
    }

/*verification de la validité de l'address email */

    if (!email.match(emailPattern)) {
        error_1.innerHTML = "addresse email non valable" ;
        return ;
    }

/* verification de la validité du mot de passe */

    if (!password.match(passwordPattern)) {
        error_1.innerHTML = "mot de passe doit comprendre au minimaum 8 caracter des chiffre des lettre " ;
        return ;
    }

/* verification de la la confirmation de mot de passe */
    if(password != confirmation) {
        error_1.innerHTML = "les deux mot de passe ne sont pas identique" ;
        return ;
    }

/* verification si l'addresse email est déja utilisé */
    $(document).ready(function(){

        $.ajax({                             /* verification de l'addresse email par une requete ajax en jQuery */
            type: "GET" ,
            url: "config/verifEmail.php?email=" + email ,
            success: function(data) {
                console.log(data);
          if (data) {
          error_1.innerHTML = "cette addresse email est déja utilisé" ;
          return false ;
            } else {
            var form1 = document.getElementById('form-1') ;            /* changement de formulaire si aprés tous les verification */
            var form2 = document.getElementById('form-2') ;

            form1.style.left = "-650px" ;
            form2.style.left = "5%" ;
            form1.style.visibility = "hidden" ;
            form2.style.visibility = "visible" ;
                }
}


});
})

}

/*************************** etape 2 ********************/

var next_2 = document.getElementById('next_2') ;

next_2.onclick = function() {

/* declaration des variables */
    var address = document.getElementById('adresse').value ;
    var city = document.getElementById("city").value ;
    var country = document.getElementById('country').value ;
    var code = document.getElementById('code').value ;
    var phone = document.getElementById('phone').value ;
    var error_2 = document.getElementById('error-2') ;
    var form2 = document.getElementById('form-2') ;
    var form3 = document.getElementById('form-3') ;
    var name = document.getElementById('name').value ;
    var lastName = document.getElementById('lastName').value ;
    var email = document.getElementById('email').value ;
    var password = document.getElementById('password').value ;

/* verification des champs de saisie */

    if (adresse === "" || city === "" || code === "" || country === "" || phone === "" ) {

        error_2.innerHTML = "veuillez remplir tous les champs" ;
        return ;
    }


        /* envoi de l'email de verification */

 
Email.send({
    
     SecureToken : "b9407a25-0b3c-41f7-8dd8-31b16ced0645 ",
    To : email,
    From : "mmazenezerguine@gmail.com",
    Subject : "code de verification",
    Body : verifCode
}).then(
  message => alert("mail has been sent sucessfully")
);


/* changement de formulaire */

    var form2 = document.getElementById('form-2') ;
    var form3 = document.getElementById('form-3') ;

    form2.style.left = "-650px" ;
    form2.style.visibility = "hidden" ;
    form3.style.left = "5%" ;
    form3.style.visibility = "visible" ;



/****************************** etape 3 ************************/

var veriff = document.getElementById('verif') ;
var submit = document.getElementById('sub') ;

veriff.onclick = function (){
                /* récupération des variables */
  var codeVerification = document.getElementById('codeVerification').value ;
  var verifMessage = document.getElementById('verifMessage') ;


    if (codeVerification === verifCode ) {             /* on compare la valuer enter par l'utilisateur avec le code de verification */          
        verifMessage.innerHTML = "code bon" ;                                   /* envoyer par email */
        verifMessage.style.color = "green" ;

        veriff.style.visibility = "hidden" ;                  /* on affiche le boutton de l'envoie de la requete post */
  sub.style.visibility = "visible" ;
} else {
    verifMessage.innerHTML = "code erroné veuillez entrer le bon code " ;   /* verification des erreur possible*/
  verifMessage.style.color = "red" ;

}
}
}
