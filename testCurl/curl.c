#include <stdlib.h>
#include <stdio.h>
#include <curl/curl.h>
#include <string.h>


void printHtml(char *url) 
{

 /*
    curl_easy_setopt : defenire des option d'execution pour le pointeur CURL *curl 
    CURLOPT_URL : pour choisir un url 
    CURLOPT_FOLLOWLOCATION : pour suivre l'adresse de l'url 
    curl_easy_cleanup : free de pointeur curl aprés la fin de chaque commande 
 */


 CURL *curl;           /*pointeur de la commande curl*/          
 CURLcode res;          /* pointeur du retour */

  curl = curl_easy_init();                                   /* initialisation d'une session curl */
  if(curl) {  
    curl_easy_setopt(curl, CURLOPT_URL, url);                /* on définit l'url qu'on veut utiliser */
    
    curl_easy_setopt(curl, CURLOPT_FOLLOWLOCATION , 1);      /* on suit l'url  */
 

    res = curl_easy_perform(curl);                           /* on execute et retourne le résultats de la commande curl */ 
    
    if(res != CURLE_OK)
      fprintf(stderr, "curl_easy_perform() failed: %s\n",   /* verification des erreurs */
              curl_easy_strerror(res));
 

    curl_easy_cleanup(curl);
  }
  

}

void downloadFile(char *url , char *fileName) 
{

  CURL *curl;                             
    FILE *fp;                             
     CURLcode res;


    
     curl = curl_easy_init();         /* initialisation de session connexion curl*/
     if (curl)
     {
         fp = fopen(fileName,"wb");                           /*ouvertur de fichier fileName mode ecriture */
         curl_easy_setopt(curl, CURLOPT_URL, url);              
         curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, NULL);   /* suivi d'url */
         curl_easy_setopt(curl, CURLOPT_WRITEDATA, fp);        /*on ecrit les data récupérer dans le fichier fileName */
         res = curl_easy_perform(curl);                     /*execution de la commande curl*/
         curl_easy_cleanup(curl);              /*free*/
         fclose(fp);                                        /*ferméture de fichier */
         printf("téléchargement terminer \n") ; 

     }   else {

         fprintf(stderr, "curl_easy_perform() failed: %s\n",   /* verification erreur */
              curl_easy_strerror(res));
              
     }
                           


}



void uploadFile(char *filePath)
{
     
    CURL *curl;
    CURLcode res;
    FILE *file ; 

    file = fopen(filePath , "rb") ;
    if(file == NULL) {                                        /* ouverture de fichier qu'on va envoyer*/
        printf("erreur d'ouverture de fichier\n") ;
        exit(1) ;  
    }
    curl_global_init(CURL_GLOBAL_ALL) ; 
    curl = curl_easy_init() ;                         /* initialisation de curl */

    if(curl) {

         curl_easy_setopt(curl, CURLOPT_UPLOAD, 1L);           /* on active l'option upload pour envoyer des fichier*/
         curl_easy_setopt(curl, CURLOPT_URL, "ftp://172.16.57.128/home/mazene");    /* on selectionne le serveur destinateur */
        curl_easy_setopt(curl, CURLOPT_READFUNCTION, fread);
        curl_easy_setopt(curl, CURLOPT_READDATA, file);              /*lecture de fichier et data */

         res = curl_easy_perform(curl) ;                         /* execution de la commande curl*/

         if(res != CURLE_OK)
      fprintf(stderr, "curl_easy_perform() failed: %s\n",curl_easy_strerror(res));   /* verification d'erreur */

              curl_easy_cleanup(curl) ; 
                                                                            /* free */
              curl_global_cleanup() ; 

              fclose(file) ;                                            /* ferméture de fichier file*/



    } 

}




int main(int argc, char const *argv[])
{
    
int close = 1 ; 
int choise ; 
char url[1200] ; 
char fileName[255] ; 
char filePath[255] ; 

while (close != 0 )
{
    
    printf(" 1 : afficher le code source d'une page web \n") ; 
    printf(" 2 : télécharger un fichier \n") ; 
    printf(" 3 : envoyer un fichier \n") ; 
    printf(" 0 : quitter \n") ;

    printf("choix : ") ;  scanf("%d" , &choise) ; 

    switch (choise)
    {
    case 1 : 
        printf("entrez l'url de la page : ") ;
        fgets(url , 1200 , stdin) ; 
        if(url[strlen(url) - 1] == '\n') url[strlen(url) - 1] = '\0' ;              /* telechargement d'une page web */
        printHtml(url) ;  
        break;
    
    
    case 2 :  
        printf("entrez l'url du fichier : ") ;
        scanf("%s" , url) ; 
        printf("entrez le nom du fichier : ") ;                                     /* telechargement d'une fichier */
        scanf("%s" , fileName) ; 
        downloadFile(url , fileName) ; 
        break ; 
    
    case 3 : 
        
        printf("entrez le chemin de fichier : ") ;                                  /* envoie d'un fichier */
        scanf("%s" , filePath) ; 

        uploadFile(filePath) ; 
        break ; 
        
    case 0 :
        printf(" programme quitter \n") ;                                           /* exit */
        exit(0) ;
        break ;  

    default : 
    printf("erreur ") ;                                                             /*cas défault*/
        break ; 
    }

}
     





return EXIT_SUCCESS ;  
}
