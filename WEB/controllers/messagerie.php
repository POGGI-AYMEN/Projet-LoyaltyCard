<?php 

    class Messagerie
    {
        public function sendMessage() 
        {
            if (isset($_POST['send']) && !empty($_POST['send'])) 
            {
                if (!empty($_POST['message'])) 
                {   
                    include "../models/adminModel.php" ; 
                    include "../models/messagerieModel.php" ; 

                    $sender = $_SESSION['clientId'] ; 

                    $reciversData = AdminModel::selectAll() ; 

                    $message = $_POST['message'] ; 

                    $adminMessage = ""; 
                    
                    for ($i = 0 ; $i < count($reciversData) ; $i++) 
                    {
                        $recivers = $reciversData[$i]['id'] ;
                        
                        MessagerieModel::sendClientMessage($sender , $recivers , $message , $adminMessage) ;

                        header('location:../view/messagerie.php') ; 
                        
                    }
                    
                    



                }

                else 
                {
                    $error = "message vide" ; 
                }
            }


        }

        public function getClientMessages($client) 
        {
            include_once "../models/messagerieModel.php" ; 

            $messages = MessagerieModel::getAll($client) ;

            return $messages ;
            
        }

        public function newMessageCount($client)
        {
            include_once "../models/messagerieModel.php" ;

            $count = MessagerieModel::getMessageCount($client) ;

            return $count ;
        }

        public function updateMessageCount($client)
        {
            include_once "../models/messagerieModel.php" ;

            MessagerieModel::updateSeen($client) ;
        }

    }