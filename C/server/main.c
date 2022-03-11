#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include "xlsxwriter.h"


/* structure sales ( les ventes de chaque entrepots )*/

typedef struct sales {
    char codeArticle[255] ;  
    char articleName[255] ; 
    int quantity ; 
} sales ;

/* structure ou on va stocké les donnée rédupérer du fichier yaml */

typedef struct yData
{
    char date[255] ;        // structure ou on va stocké les data récupérer de fichier yaml 
    char task[255] ; 
    char local[255] ; 
    sales sale ; 
} yData ;




int main(int argc, char const *argv[])
{
    
    char tmp[255] ;
    char data[255] ; 
    char **yamlData ;        // tableau qui va conternire les data de fichier yaml 
    char **salesData ;       // tableau qui va conteire les data des sales
    FILE *file ; 
    int rows ;              // variable pour calculer le nombre des ligne dans les fichiers yaml
    yData yData ;            
    int i ; 
    char yamlFiles[5][255] = {"site1.yaml" , "site2.yaml" , "site3.yaml" , "site4.yaml" , "site5.yaml"} ;  /* tableau des fichier a parcourir*/
    int row = 0 ;    // premier ligne du excele 
    int col = 0 ;     // premiere colone excel 
    int saleCol = 4 ;    // colone des sales 
    

    lxw_workbook  *workbook  = workbook_new("excle_file.xlsx");       /* création et ouverture d'un nouveau fichier excel */
    lxw_worksheet *worksheet = workbook_add_worksheet(workbook, NULL);

    

    for (i = 0 ; i<5 ; i++){            


            file = fopen(yamlFiles[i] , "r") ;           /* ouvertur des fichier en mode lecture */ 

            if (file == NULL) 
            {
                printf("impossible d'ouvrir le fichier") ;        
                return EXIT_FAILURE ;  
            }

    
            yamlData = malloc(255) ;            // allocation des deux tableau 
            salesData = malloc(255) ; 
                    rows = 0 ;
            while (fgets(data , 255 , file) , !feof(file)) 
            {
                rows ++ ;                  
                if (rows < 4)           // les 3 premier ligne du fichier la liste qui contient les data standar du fichier yaml 
                {
                    yamlData[rows] = malloc(rows * sizeof(char*)) ; 

                    strcpy(yamlData[rows] , data) ;    // on enregistre les data dans le tableau yamlData 


                }

                if (rows > 4)              // les ligne du fichier aprés les data standar ( les liste des sales )
                {
                     
                    salesData[rows] = malloc(rows * sizeof(char*)) ;    // on allou une case a chauqe fois la boucle tourne et en enregistre les data dans le tableau
                                                                        // plus tard nous allon commencer a parcourir ce tableau a partire de la 5 eme case car les 4 
                                                                            // premier sont vide  

                    strcpy(salesData[rows] , data) ;                // on stock les donnée récupérer dans le tableau salesData

                }
                
            }
                    // insertion des data récupérer dans la structure 
            sscanf (yamlData[1] , "%s %s %s" , tmp , tmp , yData.date) ; 
            sscanf (yamlData[2] , "%s %s",  tmp , yData.local) ; 
            sscanf (yamlData[3] , "%s %s " , tmp , yData.task) ; 

                            // on ecrit les data des structure dans le fichier excel 

            worksheet_write_string(worksheet, row, col,     yData.date, NULL);
            worksheet_write_string(worksheet, row, col + 2, yData.task, NULL);
            worksheet_write_string(worksheet, row, col + 3, yData.local, NULL);



    


            int s = 0;              // valeur pour sauter 3 case a chaque ecriture d'un code d'article 
            
            for (int k = 5 ; k < rows - 1 ; k=k+3 ) {   // on commaence de la 5 case du tableau et on avabce a chaque le meme nombre des variable de la structure (3) pour acceder 
                                                        // la prochaine case qui contient la meme variable
               
                sscanf(salesData[k] , "%s %s %s" , tmp ,tmp, yData.sale.codeArticle) ; 
                worksheet_write_string(worksheet, row, saleCol + s, yData.sale.codeArticle, NULL);     // ecriture dans le excel 

                s = s+3;          // on augmente le s 
            }                   
                s = 1; 

            for (int k = 6 ; k< rows - 1; k=k+3){            // on commence de la case suivant et on applique le meme principe pour acceder aux autre 

                sscanf(salesData[k] , " %s %s" ,  tmp ,yData.sale.articleName) ; 
                        worksheet_write_string(worksheet, row, saleCol + s, yData.sale.articleName, NULL);
                        s = s+3 ;


        
    }

                s = 2; 

                for (int k = 7 ; k < rows  ; k=k+3){                // meme principe des deux autres 
                   sscanf(salesData[k] , "%s %d" , tmp , &yData.sale.quantity) ;
                    worksheet_write_number(worksheet, row, saleCol + s, yData.sale.quantity, NULL);
                            s = s+3 ;
                
            }

                free (yamlData) ;         // on free les deux tableau  
                free(salesData) ;

                fclose(file) ;         // fermeture du fichier

                
                
                row++;   // on incrément la valeur de row pour passer au prochaine ligne a chaque fois le boucle for (boucle qui parcour les fichier) tourne 
            }

    workbook_close(workbook);  // on sauvgarde et on fermer le fichier excel 
        return EXIT_SUCCESS;
}


