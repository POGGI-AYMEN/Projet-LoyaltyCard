package com.pa;

import com.github.tsohr.JSONObject;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.stage.Stage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class Confirm {

    private double price;

    private double myPoints;

    private Stage stage;

    private int cardNumber;

    @FXML
    private Label payement;

    @FXML
    private Label points;

    @FXML
    void annuler(ActionEvent event) {

        this.stage.close();
    }

    @FXML
    void confirmer(ActionEvent event) throws IOException {

        URL url = new URL("http://localhost/API/carte.php?cardNumber=" + this.cardNumber + "&&type=minus");

        HttpURLConnection con = (HttpURLConnection) url.openConnection();

        con.setRequestMethod("PUT");

        con.setRequestProperty("Content-Type", "application/json; utf-8");

        con.setRequestProperty("Accept", "application/json");

        con.setDoOutput(true);

        // création d'un objet json contenat les data qu'on va envoyer
        JSONObject data = new JSONObject();

        data.put("data", myPoints);


        // écréture du body de la requete
        OutputStream outputStream = con.getOutputStream();
        outputStream.write(data.toString().getBytes());
        outputStream.flush();
        outputStream.close();


        try (BufferedReader br = new BufferedReader(
                new InputStreamReader(con.getInputStream(), "utf-8"))) {
            StringBuilder response = new StringBuilder();
            String responseLine = null;
            while ((responseLine = br.readLine()) != null) {
                response.append(responseLine.trim());


                System.out.println(response);
            }

        }

        double newPoints = price * 0.3 ;

        if (price > 100 )
        {
            int bonus = (int)price / 100 ;

            newPoints = (int)newPoints + bonus ;
        }

        url = new URL("http://localhost/API/carte.php?cardNumber=" + this.cardNumber + "&&type=plus");

        con = (HttpURLConnection) url.openConnection();

        con.setRequestMethod("PUT");

        con.setRequestProperty("Content-Type", "application/json; utf-8");

        con.setRequestProperty("Accept", "application/json");

        con.setDoOutput(true);

        // création d'un objet json contenat les data qu'on va envoyer
        data = new JSONObject();

        data.put("data", newPoints);


        // écréture du body de la requete
        outputStream = con.getOutputStream();
        outputStream.write(data.toString().getBytes());
        outputStream.flush();
        outputStream.close();


        try (BufferedReader br = new BufferedReader(
                new InputStreamReader(con.getInputStream(), "utf-8"))) {
            StringBuilder response = new StringBuilder();
            String responseLine = null;
            while ((responseLine = br.readLine()) != null) {
                response.append(responseLine.trim());


                System.out.println(response);
            }

        }
        this.stage.close();
    }





    public void setData(double price , double mypoints ,Stage stage , int cardNumber) {
    this.myPoints = mypoints ;
    this.price = price ;
    this.stage = stage ;
    this.cardNumber = cardNumber ;


        payement.setText("Nouveau prix a payer : "+this.price+" €");

        points.setText("Vous avez utiliser " + this.myPoints );

    }


}
