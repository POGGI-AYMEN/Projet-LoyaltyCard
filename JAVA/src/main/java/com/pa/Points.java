package com.pa;

import com.github.tsohr.JSONObject;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import static com.pa.Main.getStg;

public class Points {
    private int companyId;

    private String entreprise ;


    public void setData(int companyId , String entreprise) {
        this.companyId = companyId; this.entreprise = entreprise ;
    }



    @FXML
    private TextField usedPoints ;

    @FXML
    private TextField useCard;

    @FXML
    private TextField usePrice;

    @FXML
    private TextField winCard;

    @FXML
    private TextField winPrice;
    @FXML
    private Label error ;





    public void usePoints(ActionEvent event) throws IOException {

        try {
            int prix = Integer.parseInt(usePrice.getText());
        } catch (NumberFormatException e)
        {
            error.setText("Valeur de prix doit etre numérique");

        }
        String cardNumber = useCard.getText();

        int userPoints = 0;
        System.out.println(cardNumber);
        URL url = new URL("http://localhost/API/carte.php?cardNumber=" + cardNumber);

        HttpURLConnection con = (HttpURLConnection) url.openConnection();

        con.setRequestMethod("GET");


        try (BufferedReader br = new BufferedReader(
                new InputStreamReader(con.getInputStream(), "utf-8"))) {
            StringBuilder response = new StringBuilder();
            String responseLine = null;
            while ((responseLine = br.readLine()) != null) {
                response.append(responseLine.trim());

                JSONObject result = new JSONObject(response.toString()) ;

                if (!result.getJSONObject("response").getBoolean("success")) {error.setText("Numéro de carte non valide") ; }

                else
                {
                    userPoints = result.getJSONObject("response").getJSONObject("users").getInt("points") ;
                }

            }
        }
        int myPonits = Integer.parseInt(usedPoints.getText());

        if (myPonits  > userPoints)
        {
            error.setText("Votre solde actuel des point est :" + userPoints);
        }
        else
        {
            
        }
    }


    public void winPoints(ActionEvent event)
    {

    }











    // ******************** windows changing ************************//

    public void changeToArticles(ActionEvent event) throws IOException {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("article.fxml"));

        Parent root = loader.load();

        Article controller = loader.getController();

        controller.setData(companyId, entreprise);
        Stage stg = getStg();
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900));
        stg.centerOnScreen();
        stg.show();


    }

    public void changeToEdit(ActionEvent event) throws IOException {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("edit.fxml"));

        Parent root = loader.load();


        Edit controller = loader.getController();

        controller.setData(companyId, entreprise);
        Stage stg = getStg();
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900));
        stg.centerOnScreen();
        stg.show();
    }

    public void changeToPrestation(ActionEvent event) throws IOException {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("prestation.fxml"));

        Parent root = loader.load();

        Prestation controller = loader.getController();

        controller.setData(companyId, entreprise);
        Stage stg = getStg();
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900));
        stg.centerOnScreen();
        stg.show();

    }

    public void changeToApp() throws IOException {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("app.fxml"));

        Parent root = loader.load();

        App controller = loader.getController();

        controller.setData(companyId , entreprise);
        Stage stg = getStg();
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900));
        stg.centerOnScreen();
        stg.show();

    }

    public void changeToPoints(ActionEvent event) throws IOException {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("points.fxml"));

        Parent root = loader.load();

        Points controller = loader.getController();

        controller.setData(companyId, entreprise);
        Stage stg = getStg();
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900));
        stg.centerOnScreen();
        stg.show();

    }
}
