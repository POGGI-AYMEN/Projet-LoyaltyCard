package com.pa;

import com.github.tsohr.JSONObject;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class EditArticle {
    private Stage stage;
    private String entreprise;
    private String articleCode;
    private int companyId;


    @FXML
    private Label error ;


    @FXML
    private TextField price;

    @FXML
    private TextField quantity;

    @FXML
    private Button uodate;

    public void update() throws IOException {
        String prix = price.getText();
        String number = quantity.getText();


        if (prix.isEmpty() && number.isEmpty()) {
            error.setText("Merci de remplire tous les champs");
        } else {
            URL url = new URL("http://localhost/API/articles.php?type=price&&id=" + this.articleCode);

            HttpURLConnection con = (HttpURLConnection) url.openConnection();

            con.setRequestMethod("PUT");

            con.setRequestProperty("Content-Type", "application/json; utf-8");

            con.setRequestProperty("Accept", "application/json");

            con.setDoOutput(true);

            // création d'un objet json contenat les data qu'on va envoyer
            JSONObject data = new JSONObject();

            data.put("data", prix);


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
        }
        URL url = new URL("http://localhost/API/articles.php?type=stock&&id="+this.articleCode);

        HttpURLConnection con = (HttpURLConnection) url.openConnection();

        con.setRequestMethod("PUT");

        con.setRequestProperty("Content-Type", "application/json; utf-8");

        con.setRequestProperty("Accept", "application/json");

        con.setDoOutput(true);

        // création d'un objet json contenat les data qu'on va envoyer
        JSONObject data = new JSONObject();
        data.put("data", number ) ;





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
        stage.close();
        }


    public void setData(int companyId, String entreprise, Stage stage, String selectedRow) {
        this.companyId = companyId;
        this.stage = stage;
        this.entreprise = entreprise;
        this.articleCode = selectedRow;

    }
}



