package com.pa;

import com.github.tsohr.JSONObject;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class AddPrestation {

    private int companyId ;

    private String entreprise ;

    private Stage stage ;

    @FXML
    private TextField categoryInput;

    @FXML
    private TextField date_debutInput;

    @FXML
    private TextField date_finInput;

    @FXML
    private TextArea descInput;

    @FXML
    private TextField prestationInput;


    @FXML
    void addNewPrestation(ActionEvent event) throws IOException {

        String prestation = prestationInput.getText();
        String catégorie = categoryInput.getText();
        String discription = descInput.getText();
        String date_debut = date_debutInput.getText();
        String date_fin = date_finInput.getText();



        URL url = new URL("http://localhost/API/prestation.php");

        HttpURLConnection con = (HttpURLConnection) url.openConnection();

        con.setRequestMethod("POST");

        con.setRequestProperty("Content-Type", "application/json; utf-8");

        con.setRequestProperty("Accept", "application/json");

        con.setDoOutput(true);

        // création d'un objet json contenat les data qu'on va envoyer
        JSONObject data = new JSONObject();

        data.put("prestation" , prestation) ;
        data.put("catégorie" , catégorie) ;
        data.put("date_debut" , date_debut) ;
        data.put("date_fin" , date_fin) ;
        data.put("description" , discription) ;
        data.put("entreprise" , this.entreprise) ;

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

    public void setData (int companyId, String entreprise , Stage stage){
        this.companyId = companyId;
        this.entreprise = entreprise;
        this.stage = stage ;
    }



}
