exemples:

Method =GET

http://localhost/API/clients.php   		==> retourn tous les client
http://localhost/API/clients.php?client=1	==> retourn les data du client qui a l'id 1
http://localhost/API/clients.php ?delete=5	==> supprime le client id = 5



Method = PATCH 

http://localhost/API/clients.php?id=1  		==> modifier le client 5 
http://localhost/API/Entreprise.php?entreprise=2&&type=data	==>modifier les data de l'entreprise 5
http://localhost/API/entreprise.php?entreprise=5&&data=password	==>modifier le password de l'entreprise 5

http://localhost/API/carte.php?cardNumber=...&&type=plus	==> ajoute des points a la carte
http://localhost/API/carte.php?cardNumber=..&&type=minus	==> enleve des points de la carte 

Methode=POST
http://localhost/API/clients.php 		==>ajout un client a la base de donnée 

NOTE : 
il faut envoyer les data en JSON dans les requet POST et PATCH 

