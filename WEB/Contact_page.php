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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <link rel="stylesheet" href="css/Contact_page.css">
    <title>Contact</title>
</head>
<body>
    <div class=" register-form">
        <div class="custom-shape-divider-bottom-1644145560">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
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
                                        <input type="text" class="form-control" name="society_name" placeholder="Nom de la société" value=""/>
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