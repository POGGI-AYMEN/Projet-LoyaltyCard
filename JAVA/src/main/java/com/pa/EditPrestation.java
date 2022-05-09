package com.pa;

import com.github.tsohr.JSONObject;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class EditPrestation {

    private int companyId ;

    private String entreprise ;

    private Stage stage ;

    private String id ;

    @FXML
    private TextField date_debutInput;

    @FXML
    private TextField date_finInput;



    @FXML
    void update(ActionEvent event) throws IOException {

        String date_debut = date_debutInput.getText() ;

        String date_fin = date_finInput.getText() ;





        URL url = new URL("http://localhost/API/prestation.php?id="+this.id+"&&type=date_fin");

        HttpURLConnection con = (HttpURLConnection) url.openConnection();

        con.setRequestMethod("PUT");

        con.setRequestProperty("Content-Type", "application/json; utf-8");

        con.setRequestProperty("Accept", "application/json");

        con.setDoOutput(true);

        // création d'un objet json contenat les data qu'on va envoyer
        JSONObject data = new JSONObject();

        data.put("data", date_debut);


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

        url = new URL("http://localhost/API/prestation.php?id="+this.id+"&&type=date_fin");

        con = (HttpURLConnection) url.openConnection();

        con.setRequestMethod("PUT");

        con.setRequestProperty("Content-Type", "application/json; utf-8");

        con.setRequestProperty("Accept", "application/json");

        con.setDoOutput(true);

    // création d'un objet json contenat les data qu'on va envoyer
        data = new JSONObject();
        data.put("data", date_fin ) ;





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
        stage.close();
}


    public void setData(int companyId, String entreprise, Stage stage, String selectedRow) {
        this.companyId = companyId;
        this.stage = stage;
        this.entreprise = entreprise;
        this.id = selectedRow;


    }

}
