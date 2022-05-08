package com.pa;

// page de profile de l'application

import com.github.tsohr.JSONObject;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.stage.Stage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class App extends Main {

    private static int companyId ;         // l'id de l'entreprise connecter //

    private Company company  = new Company() ;

    public String entreprise ;

    @FXML
    private Label companyAdress;

    @FXML
    private Label companyCity;

    @FXML
    private Label companyCode;

    @FXML
    private Label companyContacte;

    @FXML
    private Label companyEmail;

    @FXML
    private Label companyName;

    @FXML
    private Label companyPhone;

    // Envoie de requet get pour récupéer les data de l'entreprise
    public void getCompanyData() throws IOException {
        StringBuilder result = new StringBuilder();
        URL url = new URL("http://localhost/API/entreprise.php?entreprise="+companyId);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("GET");
        try (BufferedReader reader = new BufferedReader(
                new InputStreamReader(conn.getInputStream()))) {
            for (String line; (line = reader.readLine()) != null; ) {
                result.append(line);

                JSONObject data = new JSONObject(result.toString()) ;

                this.company.setName(data.getJSONObject("response").getJSONObject("entreprise").getString("nom"));
                this.company.setEmail(data.getJSONObject("response").getJSONObject("entreprise").getString("email"));
                this.company.setAddress(data.getJSONObject("response").getJSONObject("entreprise").getString("adresse"));
                this.company.setContact(data.getJSONObject("response").getJSONObject("entreprise").getString("gérant"));
                this.company.setPhoneNumber(Integer.parseInt(data.getJSONObject("response").getJSONObject("entreprise").getString("numéro_tel")));
                this.company.setCode_postal(data.getJSONObject("response").getJSONObject("entreprise").getString("code_postal"));
                this.company.setCity(data.getJSONObject("response").getJSONObject("entreprise").getString("ville"));

                this.entreprise = data.getJSONObject("response").getJSONObject("entreprise").getString("nom") ;

            }
        }

    }

    public void setData(int data , String entreprise) throws IOException {
        companyId = data ;
        System.out.println(companyId);
        this.entreprise = entreprise ;


    }

    public void display() throws Exception {
        getCompanyData();

        companyName.setText("Bienvenu " + this.company.getName());
        companyCode.setText("Code postal : " + this.company.getCode_postal());
        companyAdress.setText("Adresse : " + this.company.getAddress());
        companyEmail.setText("Email : " + this.company.getEmail());
        companyContacte.setText("hello world");
        companyPhone.setText("numéro tel : " + this.company.getPhoneNumber());
        companyCity.setText("Ville : " + this.company.getCity());



    }

    // ****************** changement des fenetre ********************* //

    public void changeToArticles(ActionEvent event) throws IOException {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("article.fxml"));

        Parent root = loader.load();

        Article controller = loader.getController();

        controller.setData(companyId , entreprise);
        Stage stg = getStg() ;
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900)) ;
        stg.centerOnScreen();
        stg.show();


    }

    public void changeToEdit(ActionEvent event) throws IOException
    {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("edit.fxml"));

        Parent root = loader.load();


        Edit controller = loader.getController();

        controller.setData(companyId , entreprise);
        Stage stg = getStg() ;
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900)) ;
        stg.centerOnScreen();
        stg.show();
    }
    public void changeToPrestation(ActionEvent event) throws IOException
    {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("prestation.fxml"));

        Parent root = loader.load();

        Prestation controller = loader.getController();

        controller.setData(companyId , entreprise);
        Stage stg = getStg() ;
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900)) ;
        stg.centerOnScreen();
        stg.show();

    }

    public void changeToApp() throws IOException {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("app.fxml"));

        Parent root = loader.load();

        App controller = loader.getController();

        controller.setData(companyId , entreprise);
        Stage stg = getStg() ;
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900)) ;
        stg.centerOnScreen();
        stg.show();

    }

    public void changeToPoints(ActionEvent event) throws IOException
    {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("points.fxml"));

        Parent root = loader.load();

        Points controller = loader.getController();

        controller.setData(companyId , entreprise);
        Stage stg = getStg() ;
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900)) ;
        stg.centerOnScreen();
        stg.show();

    }


}


