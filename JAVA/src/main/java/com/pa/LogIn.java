package com.pa;

import com.github.tsohr.JSONObject;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;


public class LogIn extends Main{

    public int loginId ;

    @FXML
    private Button log_in ;
    @FXML
    private Label error_message ;
    @FXML
    private TextField email ;


    @FXML
    private PasswordField password ;




    private void checkLogin() throws IOException {
        // on récuper les valeur des entré de l'utilisateur //

        String emailValue = email.getText().toString() ;
        String passwordValue = password.getText().toString() ;

        // verification si les champs sont vide //
      if (emailValue.isEmpty() || passwordValue.isEmpty())
      {
        error_message.setText("Merci de remplire les deux champs");
      }
      else
      {
          // création d'une requete http vers l'api //
          URL url = new URL ("http://localhost/API/logIn.php");

          HttpURLConnection con = (HttpURLConnection)url.openConnection();

          con.setRequestMethod("POST");

          con.setRequestProperty("Content-Type", "application/json; utf-8");

          con.setRequestProperty("Accept", "application/json");

          con.setDoOutput(true);

          // création d'un objet json contenat les data qu'on va envoyer
          JSONObject data = new JSONObject() ;
          data.put("email" , emailValue) ;
          data.put("password" , passwordValue) ;

          // écréture du body de la requete
          OutputStream outputStream=con.getOutputStream();
          outputStream.write(data.toString().getBytes());
          outputStream.flush();
          outputStream.close();

            // lecture de la réponse //
            int companyId = 0  ;            // l'id de l'entreprise qu'on va passer au class App.java

            int status ;                    // le status du retour de la requete get

          try(BufferedReader br = new BufferedReader(
                  new InputStreamReader(con.getInputStream(), "utf-8"))) {
              StringBuilder response = new StringBuilder();
              String responseLine = null;
              while ((responseLine = br.readLine()) != null) {
                  response.append(responseLine.trim());
                  JSONObject res = new JSONObject(response.toString()) ;            // on mets la réponsse dans un objet json

                  status = res.getJSONObject("response").getInt("success") ;        // on parse le statut de retour de la requete

                  if (status == 0) {error_message.setText("email ou mot de passe erroné");}     // echec <envoie de message d'erreur>
                  else {companyId = res.getJSONObject("response").getJSONObject("data").getInt("id");}  // success <on récupere l'id de l'entreprise>
              }

              this.loginId = companyId ;            // on update la valeur de loginId


              // on change le scene vers le scene de l'application principale //
              FXMLLoader loader = new FXMLLoader(getClass().getResource("app.fxml"));

              Parent root = loader.load();

              App controller = loader.getController();

              controller.setData(this.loginId , "");         // on passe l'id de l'entreprise a App.java
              controller.display();

              // paramettre de la fentre
              Stage stg = getStg() ;
              stg.setResizable(false);
              stg.setTitle("LoyaltyCard");
              stg.setScene(new Scene(root, 1600, 900)) ;
              stg.centerOnScreen();
              stg.show();


          } catch (IOException e) {
              System.out.println("erreur d'envoie de la requete");
              System.err.println(e);
          } catch (Exception e) {
              e.printStackTrace();
          } finally {
              con.disconnect();
          }



      }


    }

    // fonv
    public void logIn(ActionEvent event) throws IOException
    {
        checkLogin() ;
    }

}
