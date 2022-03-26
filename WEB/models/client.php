<?php 

include 'config/database.php' ; 

class Client{
    private $id ; 
    private $name ; 
    private $lastName ; 
    private $email ; 
    private $telephone ; 
    private $password ; 
    private $addresse ; 
    private $city ; 
    private $code ; 
    private $country ; 
    private $cardNumber ; 

    public function __construct($name , $lastName ,$telephone , $password , $addresse , $city , $code , $country , $cardNumber){

        $this->$name = $name;
        $this->$lastName = $lastName;
        $this->$email = $email;
        $this->$telephone = $telephone;
        $this->$password = $password;
        $this->$addresse = $addresse;
        $this->$city = $city;
        $this->$code = $code;
        $this->$country = $country;
        $this->$cardNumber = $cardNumber;
        
    }

    public function addClient(Client $client){
        
        $sql = "INSERT INTO Clients (nom ,prenom ,num_tel, email ,mdp, adresse, ville , code_postal	, pays , num_carte) VALUES (? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 

        $insertQuery = $con->prepare($sql) ; 

        $insertQuery->execute([
            $client->$name ,
            $client->$lastName ,
            $client->$telephone ,
            $client->$email , 
            $client->password,
            $client->$addresse,
            $client->$city , 
            $client->$code,
            $client->$country,
            $client->$cardNumber 
        ]) ; 
        
    }

    public function getClient()
    {

    }



}