<?php  
   if (isset($_POST['submit'])) {
       if(empty($_POST['society_name']) || empty($_POST['email']) || empty($_POST['phone_number']) || empty($_POST['message'])){
          $error = "Veillez remplir tous les champs!";
       }else { 
        $society_name = htmlspecialchars($_POST['society_name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $from = 'From:' . $email;
        $phone_number = $_POST['phone_number'];
        $to = 'loyalty.card6@gmail.com';
        $subject = 'Demande d\'addmission';
        $body = "Society: $society_name\n E-Mail: $email\n Numero de telephone : $phone_number\n Message:\n\n\n $message";

             if(mail ($to, $subject, $body, $from)) {
                $thank_you_msg =  "Merci de rester en contact! \n 

                Nous apprécions que vous nous contactiez Localty Boost. Un de nos collègues vous recontactera bientôt ! Bonne journée !";
            }
            else{
                $error_mail =  "Votre mail n'est pas envoyé! veillez essayer ultérieurement";}
       }        
   }
   require("header.php");
?>

    <div class=" register-form">
     
                <div class="note">
                    <div class="description">
                        <h1 class=" text-center ">Boostez votre entreprise!</h1>
                        <p class="text-center text-monospace">Rejoignez Loyalty Boost! remplissez le formulaire et attendez une reponse au plus 
                                vite par un menmbre de  qui va prendre un rendez vous telephonique avec vous.
                        </p>
                    </div>
                </div>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $error ?>
                    </div>
                <?php elseif(isset($thank_you_msg)) : ?>
                    <div class="alert alert-success text-center">
                        <?= $thank_you_msg ?>
                    </div> 
                <?php elseif(isset($error_mail)) : ?>  
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $error_mail ?>
                    </div>  
                <?php endif; ?>
                

                <form action="#" method="post" class="form">
                        <div class="container form-content">  
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="society_name" placeholder="Nom " value=""/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email" name="email" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="phone_number" placeholder="Numéro de Téléphone" value=""/>
                                    </div>
                                   
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" placeholder="Message" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Envoyer" class="btnSubmit"/>
                        </div>    
                </form>
                
    </div>
</body>
</html>