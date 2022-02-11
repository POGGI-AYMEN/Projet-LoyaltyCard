#include <stdlib.h>
#include <stdio.h>
#include <gtk/gtk.h>
#include <curl/curl.h>
#include <string.h>



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


/* fonction de l'affichage de la fentre des erreur */

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


/* fonction de l'ajout d'une tahces au fichier yaml*/

void on_addButton_clicked(int argc , char **argv) {
char date[12] ;
char local[12] ;
char task[255] ;
FILE *yaml ;
char fileName[255] ;


/* récupération des valeur des entrés GTK */
sprintf(date , "%s" , gtk_entry_get_text(GTK_ENTRY(dateEntry))) ;
sprintf(local , "%s" , gtk_entry_get_text(GTK_ENTRY(localEntry))) ;
sprintf(task , "%s" , gtk_entry_get_text(GTK_ENTRY(taskEntry))) ;

strcat(strcpy(fileName , local) , ".yaml") ;
yaml = fopen(fileName , "a+") ;                               /* création ou ouverture du fichier yaml selon l'entrepot conserné <nom_de_l'entrepot.yaml> */

if(yaml == NULL) {
                                                                      /*on cas d'echec de l'ouverture du fichier yaml renvoi d'une fentre d'erreur */
  createErrorWindow(&argc , &argv) ;
  gtk_label_set_text(GTK_LABEL(errorLabel) , " erruer d'ouverture du fichier yaml !! ") ;

  gtk_main() ;

} else {

  if (strlen(date) == 0 || strlen(task) == 0 || strlen(local) == 0) {

    createErrorWindow(&argc , &argv) ;                            /*en cas d'un champs vide affichage d'une fentre qui demande à l'utilisater de remplire tous les champs*/

    gtk_label_set_text(GTK_LABEL(errorLabel) , "merci de remplire tous les champs avant d'ajouter  ") ;

    gtk_main() ;

  }
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


}
fclose(yaml) ;                          /* ferméture de fichier yaml */



}

/*fonction d'envoi de fichier yaml */

void on_sendButton_clicked(int argc , char **argv) {

                              /*affcihage d'une fenetre qui demande à l'utilisater de séléction l'entrepot concerné afin de pouvoir
                                                        ouvrire le bon fichier yaml
                                                                                                                                  */

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
/*foncrion d'envoie du fichier yaml en ftp*/
void on_sendButton2_clicked(int argc , char **argv) {


}



                                                              /* fonction main du programme */

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





  /*affichage de la fentre principale du programme */

  gtk_builder_connect_signals(builder , NULL) ;                /* recupération des signaux et des callback GTK */

  g_object_unref(builder) ;

  gtk_widget_show(mainWindow) ;                               /* affichage du fentre */
  gtk_main() ;



  return EXIT_SUCCESS ;
}
