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

public class AddArticle {
    private String entreprise;
    private int companyId;
    private Stage stage ;

    @FXML
    private TextField article;

    @FXML
    private TextField category;

    @FXML
    private TextArea desc;

    @FXML
    private TextField price;

    @FXML
    private TextField quantity;

    @FXML
    void addNewProduct(ActionEvent event) throws IOException {

        String product = article.getText();
        String productCategory = category.getText();
        String discription = desc.getText();
        String productPrice = price.getText();
        String number = quantity.getText();


        System.out.println(generateCodeArticle());

        URL url = new URL("http://localhost/API/articles.php");

        HttpURLConnection con = (HttpURLConnection) url.openConnection();

        con.setRequestMethod("POST");

        con.setRequestProperty("Content-Type", "application/json; utf-8");

        con.setRequestProperty("Accept", "application/json");

        con.setDoOutput(true);

        // création d'un objet json contenat les data qu'on va envoyer
        JSONObject data = new JSONObject();
        data.put("codeArticle", generateCodeArticle() ) ;
        data.put("nom" , product) ;
        data.put("categorie" , productCategory) ;
        data.put("prix" , productPrice) ;
        data.put("vendeur" , this.entreprise) ;
        data.put("quantity" , number) ;
        data.put("entrepots" , "") ;
        data.put("description" , discription) ;




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

        public void setData (int companyId, String entreprise , Stage stage){
            this.companyId = companyId;
            this.entreprise = entreprise;
            this.stage = stage ;
        }

        private String generateCodeArticle()
        {
            // chose a Character random from this String
            String AlphaNumericString = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
                    + "0123456789" ;

            StringBuilder sb = new StringBuilder(5);
            for (int i = 0; i < 5; i++) {

                int index
                        = (int)(AlphaNumericString.length()
                        * Math.random());

                sb.append(AlphaNumericString
                        .charAt(index));
            }

            return sb.toString();
        }
    }



