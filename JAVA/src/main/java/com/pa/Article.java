package com.pa;

import com.github.tsohr.JSONArray;
import com.github.tsohr.JSONException;
import com.github.tsohr.JSONObject;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ResourceBundle;

import static com.pa.Main.getStg;

public class Article implements Initializable
{

    public String entreprise ;


    @FXML
    private TableColumn<Articles, String> articleCatégorie;

    @FXML
    private TableColumn<Articles, String> articleName;

    @FXML
    private TableColumn<Articles, String> articlePrice;

    @FXML
    private TableColumn<Articles, String> articleQiantity;

    @FXML
    private TableView<Articles> tabelView;

    @FXML
    private TableColumn<Articles, String> articleCode;

    private ObservableList<Articles> products ;

    private int companyId;




    public void getArticlsData() throws IOException {

        StringBuilder result = new StringBuilder();
        URL url = new URL("http://localhost/API/articles.php?company=" + entreprise);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("GET");
        products = FXCollections.observableArrayList() ;
        try (BufferedReader reader = new BufferedReader(
                new InputStreamReader(conn.getInputStream()))) {
            for (String line; (line = reader.readLine()) != null; ) {

                result.append(line);

                try {
                    JSONObject list = new JSONObject(result.toString()) ;

                    JSONArray data = list.getJSONArray("articles") ;

                    for (int i = 0 ; i < data.length() ; i++)
                    {
                        Articles articles = new Articles(data.getJSONObject(i).getString("codeArticle") , data.getJSONObject(i).getString("nom") , data.getJSONObject(i).
                                getInt("prix") ,data.getJSONObject(i).getInt("quantité") , data.getJSONObject(i).getString("catégorie")) ;


                        products.add(articles) ;

                    }

                } catch (JSONException e)
                {

                }



            }
        }
    }




    public void getRows() throws IOException {
        getArticlsData();

        articleCatégorie.setCellValueFactory(new PropertyValueFactory<>("category"));
        articleName.setCellValueFactory(new PropertyValueFactory<>("nameArticle"));
        articleCode.setCellValueFactory(new PropertyValueFactory<>("codeArticle"));
        articlePrice.setCellValueFactory(new PropertyValueFactory<>("price"));
        articleQiantity.setCellValueFactory(new PropertyValueFactory<>("quantity"));

        tabelView.setItems(products);
    }


    public void add(ActionEvent event) throws IOException
    {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("add_article.fxml"));
        Parent root = (Parent) loader.load();
        Stage stage = new Stage();
        AddArticle controller = loader.getController();

        controller.setData(companyId , entreprise , stage);
        stage.setScene(new Scene(root));
        stage.setTitle("LoyaltyBoost");
        stage.setResizable(false);;
        stage.show();

    }

    public void refresh() throws IOException {

        getRows();
    }

    public void delete() throws IOException {
        String selectedRow = tabelView.getSelectionModel().getSelectedItem().getCodeArticle();

        StringBuilder result = new StringBuilder();
        URL url = new URL("http://localhost/API/articles.php?delete=" + selectedRow);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("GET");
        products = FXCollections.observableArrayList();
        try (BufferedReader reader = new BufferedReader(
                new InputStreamReader(conn.getInputStream()))) {
            for (String line; (line = reader.readLine()) != null; ) {

                result.append(line);
            }
        }
        getRows();
    }



    public void update () throws IOException {
        String selectedRow = tabelView.getSelectionModel().getSelectedItem().getCodeArticle();

        FXMLLoader loader = new FXMLLoader(getClass().getResource("edit_article.fxml"));
        Parent root = (Parent) loader.load();
        Stage stage = new Stage();
        EditArticle controller = loader.getController();

        controller.setData(companyId , entreprise , stage , selectedRow);
        stage.setScene(new Scene(root));
        stage.setTitle("LoyaltyBoost");
        stage.setResizable(false);;
        stage.show();



    }

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

    void setData(int companyId, String entreprise) {
        this.entreprise = entreprise ;
        this.companyId = companyId ;
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


    @Override
    public void initialize(URL url, ResourceBundle resourceBundle){

        try {
            getRows();
        } catch (IOException e) {
            e.printStackTrace();
        }

    }
}
