<?php 

    class Password 
    {
        public function generatePassword()
        {
           
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $string = '';
            
                for ($count = 0; $count < 8 ; $count++) {      /* une fonction de création d'une random chaine de caractere d'une taille de 8 */
                  $tmp = rand(0, strlen($characters) - 1);
                  $string .= $characters[$tmp];
              }
            
              return $string;
          }
          
        }
    