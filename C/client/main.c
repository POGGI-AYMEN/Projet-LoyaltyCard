#include <stdlib.h>
#include <stdio.h>
#include <gtk/gtk.h>
#include <curl/curl.h>
#include <string.h>
#include <mariadb/mysql.h>


/* fonction d'affichage des erreur mysql */

void finish_with_error(MYSQL *con)
{
  fprintf(stderr, "%s\n", mysql_error(con));
  mysql_close(con);
  exit(1);
}


/* declaration des variables GTK */

GtkBuilder *builder ;
GtkWidget *mainWindow ;
GtkWidget *addButton ;
GtkWidget *dateEntry ;
GtkWidget *selectBox ;
GtkWidget *taskEntry ;
GtkWidget *localEntry ;
GtkWidget *errorWindow ;
GtkWidget *errorLabel ;
GtkWidget *sendButton ;
GtkWidget *selectWindow ;
GtkWidget *localEntry2 ;
GtkWidget *sendButton2 ;
GtkWidget *grid ;
GtkWidget *listLable[10000] ;
GtkWidget *view ;


/* *************************fonction de l'affichage de la fentre des erreur *******************************/

void createErrorWindow(int argc , char **argv) {
  gtk_init(&argc , &argv) ;                                                  /* initialisation GTK */

  builder = gtk_builder_new() ;
  gtk_builder_add_from_file(builder , "app.glade" , NULL) ;                 /* récupération du fichier app.glade */

  errorWindow = GTK_WIDGET(gtk_builder_get_object(builder , "errorWindow")) ;  /*récupération des widget */
  errorLabel = GTK_WIDGET(gtk_builder_get_object(builder , "errorLabel")) ;


                                                                  /* lasion avec gtk_builder */

  gtk_builder_connect_signals(builder , NULL) ;

  g_object_unref(builder) ;

  gtk_widget_show(errorWindow) ;                                       /* affichage du fenetre d'errur */
}


/******************************** fonction de l'ajout d'une tahces au fichier yaml******************************/

void on_addButton_clicked(int argc , char **argv) {
char date[12] ;
char local[12] ;
char task[255] ;
FILE *yaml ;
char fileName[255] ;
int status = 1 ;
FILE *taskLog ;
int rowsNumber ;



/* récupération des valeur des entrés GTK */
sprintf(date , "%s" , gtk_entry_get_text(GTK_ENTRY(dateEntry))) ;
sprintf(local , "%s" , gtk_entry_get_text(GTK_ENTRY(localEntry))) ;
sprintf(task , "%s" , gtk_entry_get_text(GTK_ENTRY(taskEntry))) ;

/* récupération des donnée de la BDD */





/* verification des erreur possible */

strcat(strcat(strcpy(fileName , "yamlFiles/") ,local) , ".yaml") ;
yaml = fopen(fileName , "w") ;                               /* création ou ouverture du fichier yaml selon l'entrepot conserné <nom_de_l'entrepot.yaml> */

if(yaml == NULL) {
                                                                      /*on cas d'echec de l'ouverture du fichier yaml renvoi d'une fentre d'erreur */
  createErrorWindow(&argc , &argv) ;
  gtk_label_set_text(GTK_LABEL(errorLabel) , " erruer d'ouverture du fichier yaml !! ") ;

  gtk_main() ;

} else {

  if (strlen(date) == 0 || strlen(task) == 0 || strlen(local) == 0) {   /*en cas d'un champs vide affichage d'une fentre qui demande à l'utilisater de remplire tous les champs*/

    createErrorWindow(&argc , &argv) ;

    gtk_label_set_text(GTK_LABEL(errorLabel) , "merci de remplire tous les champs avant d'ajouter  ") ;

    gtk_main() ;

    status = 0 ;                                     /* en cas de champs non rempli en mis la valeur de verification a 0 */

  }
  if(strlen(date) != 10 ) {                                                 /* verification de la valeur du date entrer 'format dd/mm/yyyy'*/
    createErrorWindow(&argc , &argv) ;

    gtk_label_set_text(GTK_LABEL(errorLabel) , "                         date éroné : \n entrer un date au format (dd/mm/yyyy) ") ;

    gtk_main() ;

    status = 0 ;
  }
  if(status == 1) {                                /* on execute cette partie du conde uniquement si tous les champs sont bien remplie */
  char *tmp ;                                      /* ecréture des donnée dans le fichier yaml */

  tmp = malloc(255) ;
  strcat(strcpy(tmp , "- date: ") , date) ;           //- date: date
  fputs(tmp , yaml) ;
  fputc('\n' , yaml) ;
  free(tmp) ;
  tmp = malloc(255) ;
  strcat(strcpy(tmp , "  entrepot: ") , local) ;    // entrepot: local
  fputs(tmp , yaml) ;
  fputc('\n' , yaml) ;
  free(tmp) ;
  tmp = malloc(255) ;
  strcat(strcpy(tmp , "  tache: ") , task) ;        // tache: task
  fputs(tmp , yaml) ;
  fputc('\n' , yaml) ;
  free(tmp) ;





  MYSQL *con = mysql_init(NULL) ;                         /* inistialisation de la connexion mysql */

  if (con == NULL)
    {
        fprintf(stderr, "mysql_init() failed\n");
        exit(1);
    }

    if (mysql_real_connect(con, "localhost", "root", "root","PA", 0, NULL, 0) == NULL)
    {
        finish_with_error(con);                               /* connexion  à la base de donnée */
    }

      if (mysql_query(con, "SELECT COUNT(*) FROM Ventes"))              /*on récupere le nombre des colomns de la table vents */
    {
        finish_with_error(con);
    }

     MYSQL_RES *result = mysql_store_result(con);         /* variable pour le stockage des résultats */

    if (result == NULL)
    {
        finish_with_error(con);
    }

    int fildes = mysql_num_fields(result) ;

    MYSQL_ROW row;

    while ((row = mysql_fetch_row(result)))
    {

  rowsNumber = atoi(row[0]) ;                  /* on stock le nombre de ligne dans la variable rowsNumber*/


    }


    char sqlQuery[255] ;

    strcat(strcat(strcat(strcat(strcpy(sqlQuery , "SELECT * FROM Ventes WHERE date = '") , date) ,"' AND entrepots ='"),local),"'");

      if (mysql_query(con, sqlQuery))      {
        finish_with_error(con);
    }

     result = mysql_store_result(con);         /* variable pour le stockage des résultats */

    if (result == NULL)
    {
        finish_with_error(con);
    }
    fildes = mysql_num_fields(result) ;
    int rows = 0 ;
    char sql[fildes][255] ;
    char sqlData[rowsNumber][fildes][255] ;

    int i;

    while ((row = mysql_fetch_row(result)))
    {

    for (int i = 0 ; i< fildes ; i++) {
      strcpy(sqlData[rows][i] , row[i]) ;
    }
   rows ++ ;
   }
   if (rows != 0) {

   tmp = malloc(255) ;
   strcpy(tmp , "  sales: ")  ;        // tache: task
   fputs(tmp , yaml) ;
   fputc('\n' , yaml) ;
   free(tmp) ;

   for (int k = 0 ; k < rows ; k++) {

   tmp = malloc(255) ;
   strcat(strcpy(tmp , "   - articleCode: ") , sqlData[k][0]) ;        // tache: task
   fputs(tmp , yaml) ;
   fputc('\n' , yaml) ;
   free(tmp) ;

   tmp = malloc(255) ;
   strcat(strcpy(tmp , "     articleName: ") , sqlData[k][1]) ;        // tache: task
   fputs(tmp , yaml) ;
   fputc('\n' , yaml) ;
   free(tmp) ;

   tmp = malloc(255) ;
   strcat(strcpy(tmp , "     quantity: ") , sqlData[k][2]) ;        // tache: task
   fputs(tmp , yaml) ;
   fputc('\n' , yaml) ;
   free(tmp) ;

   }

       }else
   {
    tmp = malloc(255) ;
   strcpy(tmp , "  sales: no sales today")  ;        // tache: task
   fputs(tmp , yaml) ;
   fputc('\n' , yaml) ;
   free(tmp) ;
   }


     mysql_free_result(result);
     mysql_close(con);                          /* ferméture de la connexion mysql */



  tmp = malloc(255) ;

  strcat(strcat(strcpy(tmp , date) , ":  " ),task) ;   /*tmp = dd/mm/yyyy:  task */

  taskLog = fopen("./config/taskLog.txt" , "a+") ;       /* ecreture des taches effecué dans un fichier taskLog*/
  fputs(tmp , taskLog) ;
  fputc('\n' , taskLog) ;

  fclose(taskLog) ;                                    /* ferméture du fichier taslLog */
  free(tmp) ;

  createErrorWindow(&argc , &argv) ;

    gtk_label_set_text(GTK_LABEL(errorLabel) , "                       tache ajouter              ") ;
    gtk_main() ;




}

}


fclose(yaml) ;                          /* ferméture de fichier yaml */




}

/*********************************************** selection d'entrepot d'envoie ******************************************/

void on_sendButton_clicked(int argc , char **argv) {
                              /*affcihage d'une fenetre qui demande à l'utilisater de séléction l'entre*/

  char local[255] ;

  gtk_init(&argc , &argv) ;

  builder = gtk_builder_new() ;
  gtk_builder_add_from_file(builder , "app.glade" , NULL) ;

  localEntry2 = GTK_WIDGET(gtk_builder_get_object(builder , "localEntry2")) ;
  selectWindow = GTK_WIDGET(gtk_builder_get_object(builder , "selectWindow")) ;
  sendButton2 = GTK_WIDGET(gtk_builder_get_object(builder , "sendButton2")) ;


  gtk_builder_connect_signals(builder , NULL) ;

  g_object_unref(builder) ;

  gtk_widget_show(selectWindow) ;
    gtk_main() ;

}
/***************************************** fonction d'envoie du fichier yaml **********************************************/

void on_sendButton2_clicked(int argc , char **argv) {
  char local[255] ;
  char filePath[255] ;
  FILE *file ;
  CURL *curl;
  CURLcode res;
  char url[255] ;


  sprintf(local , "%s" , gtk_entry_get_text(GTK_ENTRY(localEntry2))) ;                        /* récupération de la valeur de l'entré gtk */

  strcat(strcat(strcpy(filePath , "yamlFiles/"),local),".yaml");
  strcat(strcpy(url , "ftp://mazene:1234@172.16.57.128/home/mazene/") , filePath) ;


  struct curl_slist *headerlist = NULL ;

  file = fopen(filePath , "rb") ;                                                          /* ouverture du fichier a envoyer */

  if (file == NULL ) {                                                                     /* verification si le fichier n'existe pas */

    gtk_window_close (selectWindow);

    createErrorWindow(&argc , &argv) ;                            /*en cas d'un champs vide affichage d'une fentre qui demande à l'utilisater de remplire tous les champs*/

    gtk_label_set_text(GTK_LABEL(errorLabel) , "                       aucunne tache n'est entré               ") ;


  }  else {
    struct curl_slist *headerlist = NULL;


    curl_global_init(CURL_GLOBAL_ALL);                                      /* initialisation de curl */
    curl = curl_easy_init();

    headerlist = curl_slist_append(headerlist, filePath);                  /*liste des header curl <nom du fichier a envoyer / nom du fichier aprés l'evoie >*/
    headerlist = curl_slist_append(headerlist, filePath);

    curl_easy_setopt(curl, CURLOPT_READFUNCTION, fread);                 /* lecture du fichier yaml */

    curl_easy_setopt(curl, CURLOPT_UPLOAD, 1L);                           /* activation de la fonctionalité upload*/
    curl_easy_setopt(curl, CURLOPT_URL, url);                             /*on définit le serveur ou on veut envoyer le fichier*/
    curl_easy_setopt(curl, CURLOPT_POSTQUOTE, headerlist);                /* on applic la liste des headers */
    curl_easy_setopt(curl, CURLOPT_READDATA, file);
    res = curl_easy_perform(curl);                                       /* on execute la commande curl */

    if(res != CURLE_OK)
      fprintf(stderr, "curl_easy_perform() failed: %s\n",               /* verification d'erreur */
              curl_easy_strerror(res));


    curl_slist_free_all(headerlist);                                       /*free de la liste des headers */


    curl_easy_cleanup(curl);                                              /* free de curl */


  fclose(file); /* close the local file */                              /* ferméture du fichier */

  curl_global_cleanup();

  gtk_window_close (selectWindow);                                  /* affichage d'une fentre avec un message de success */

  createErrorWindow(&argc , &argv) ;

  gtk_label_set_text(GTK_LABEL(errorLabel) , "                       fichier envoyer              ") ;


  gtk_main() ;
}



  }

void on_showButton_clicked() {


  CURL *curl;
  FILE *file;
  CURLcode res;
  char url[] = "172.16.57.128/home/mazene/home.xls" ;


     curl = curl_easy_init();         /* initialisation de curl*/
     if (curl)
     {
         file = fopen("new.xls","wb");                           /*ouvertur de fichier fileName mode ecriture */
         curl_easy_setopt(curl, CURLOPT_URL, url);
         curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, NULL);   /* suivi d'url */
         curl_easy_setopt(curl, CURLOPT_WRITEDATA, file);        /*on ecrit les data récupérer dans le fichier fileName */
         res = curl_easy_perform(curl);                     /*execution de la commande curl*/
         curl_easy_cleanup(curl);              /*free*/
         fclose(file);                                        /*ferméture de fichier */
         printf("téléchargement terminer \n") ;

         system("open new.xls") ;

     }   else {

         fprintf(stderr, "curl_easy_perform() failed: %s\n",   /* verification erreur */
              curl_easy_strerror(res));

     }

}


/***************************************** fonction main du programme ****************************************/

int main(int argc , char **argv) {

  gtk_init(&argc , &argv) ;                                   /* initialisation de GTL */

  builder = gtk_builder_new() ;
  gtk_builder_add_from_file(builder , "app.glade" , NULL) ;   /* laison de GTK builder avec le fichier app.glade */


  /*recuperation des widget GTK du fichier app.glade*/

  mainWindow  = GTK_WIDGET(gtk_builder_get_object(builder , "mainWindow")) ;
  addButton =  GTK_WIDGET(gtk_builder_get_object(builder , "addButton")) ;
  dateEntry =  GTK_WIDGET(gtk_builder_get_object(builder , "dateEntry")) ;
  selectBox = GTK_WIDGET(gtk_builder_get_object(builder , "selectBox")) ;
  taskEntry = GTK_WIDGET(gtk_builder_get_object(builder , "taskEntry")) ;
  localEntry = GTK_WIDGET(gtk_builder_get_object(builder , "localEntry")) ;
  sendButton = GTK_WIDGET(gtk_builder_get_object(builder , "sendButton")) ;
  grid = GTK_WIDGET(gtk_builder_get_object(builder , "grid")) ;
  view =  GTK_WIDGET(gtk_builder_get_object(builder , "view")) ;




 /* affichage de la liste des taches */

FILE *list = fopen ( "config/taskLog.txt" , "rt" ) ;             /* ouverture du fichier taslLog.txt en mode écréture */
if ( list == NULL ) {
  list = fopen("./config/taskLog.txt" , "w") ;                    /* si le fichier n'existe pas on le crée pour évité un erreur de segmentation */

}

int row = 0 ;                                                   /* valeur de la position des element de grid GTK */
char tasks[1024] ;

while (1) {

  if (fgets(tasks , 1024 , list) == NULL ) {                   /* on lit le fichier ligne par ligne */
    fclose(list) ;
    break ;                                                   /* si le retour de fgets == NULL <fin du fichier> on quitte la boucle */
  }
  tasks[strlen(tasks) - 1] = '\0' ;
  gtk_grid_insert_row (grid , row) ;                          /* on rajout une ligne au gride */
  listLable[row] = gtk_label_new(tasks) ;                     /* création d'une label */
  gtk_label_set_justify (GTK_LABEL(listLable[row]) , GTK_JUSTIFY_LEFT) ;                    /* position du label */
  gtk_label_set_xalign (GTK_LABEL(listLable[row]) , 0.0) ;
  gtk_grid_attach (GTK_GRID(grid) , listLable[row] , 1 ,row , 1 , 1 ) ;                  /*laison du label avec le grid */
  row ++ ;             /* incrémentation du row */

}


  /*affichage de la fentre principale du programme */

  gtk_builder_connect_signals(builder , NULL) ;                /* recupération des signaux et des callback GTK */

  g_object_unref(builder) ;

  gtk_widget_show_all(mainWindow) ;                               /* affichage du fentre */
  gtk_main() ;




  return EXIT_SUCCESS ;
}
