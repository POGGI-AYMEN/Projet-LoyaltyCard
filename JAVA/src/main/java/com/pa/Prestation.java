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

public class Prestation implements Initializable
{

    public String entreprise ;



    @FXML
    private TableColumn<Prestations, String> catégorie;

    @FXML
    private TableColumn<Prestations, String> id;

    @FXML
    private TableColumn<Prestations, String> date_debut;

    @FXML
    private TableColumn<Prestations, String> date_fin;



    @FXML
    private TableColumn<Prestations, String> prestation;



    @FXML
    private TableView<Prestations> tabelView;

    private ObservableList<Prestations> prestations ;

    private int companyId;




    public void getArticlsData() throws IOException {

        StringBuilder result = new StringBuilder();
        URL url = new URL("http://localhost/API/prestation.php?company=" + entreprise);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("GET");
        prestations = FXCollections.observableArrayList() ;
        try (BufferedReader reader = new BufferedReader(
                new InputStreamReader(conn.getInputStream()))) {
            for (String line; (line = reader.readLine()) != null; ) {

                result.append(line);

                try {
                    System.out.println(result);

                    JSONObject list = new JSONObject(result.toString()) ;

                    System.out.println(list);
                    JSONArray data = list.getJSONObject("response").getJSONArray("prestation") ;




                    for (int i = 0 ; i < data.length() ; i++)
                    {
                        Prestations prest = new Prestations(data.getJSONObject(i).getString("date_debut") , data.getJSONObject(i).getString("date_fin") , data.getJSONObject(i).
                                getString("nom") ,data.getJSONObject(i).getString("catégorie") , data.getJSONObject(i).getString("id")) ;

                        System.out.println(data.getJSONObject(i).getString("id"));
                        prestations.add(prest) ;


                    }

                } catch (JSONException e)
                {

                }



            }
        }
    }




    public void getRows() throws IOException {
        getArticlsData();

        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        catégorie.setCellValueFactory(new PropertyValueFactory<>("catégori"));
        prestation.setCellValueFactory(new PropertyValueFactory<>("nom"));
        date_fin.setCellValueFactory(new PropertyValueFactory<>("date_fin"));
        date_debut.setCellValueFactory(new PropertyValueFactory<>("date_debut"));

        tabelView.setItems(prestations);
    }


    public void add(ActionEvent event) throws IOException
    {

        FXMLLoader loader = new FXMLLoader(getClass().getResource("add_prestation.fxml"));
        Parent root = (Parent) loader.load();
        Stage stage = new Stage();
        AddPrestation controller = loader.getController();

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
        String selectedRow = tabelView.getSelectionModel().getSelectedItem().getId();

        System.out.println(selectedRow);
        StringBuilder result = new StringBuilder();
        URL url = new URL("http://localhost/API/prestation.php?delete=" + selectedRow);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("GET");
        prestations = FXCollections.observableArrayList();
        try (BufferedReader reader = new BufferedReader(
                new InputStreamReader(conn.getInputStream()))) {
            for (String line; (line = reader.readLine()) != null; ) {

                result.append(line);
            }
        }
        getRows();

    }

    public void usersList(ActionEvent event) throws IOException {

        String selectedRow = tabelView.getSelectionModel().getSelectedItem().getId();

        FXMLLoader loader = new FXMLLoader(getClass().getResource("users_list.fxml"));
        Parent root = (Parent) loader.load();
        Stage stage = new Stage();

        UsersList controller = loader.getController();

        controller.setData(selectedRow);

        stage.setScene(new Scene(root));
        stage.setTitle("LoyaltyBoost");
        stage.setResizable(false);;
        stage.show();
    }

    public void update () throws IOException {

        String selectedRow = tabelView.getSelectionModel().getSelectedItem().getId();

        FXMLLoader loader = new FXMLLoader(getClass().getResource("edit_prestation.fxml"));
        Parent root = (Parent) loader.load();
        Stage stage = new Stage();
        EditPrestation controller = loader.getController();

        controller.setData(companyId , entreprise , stage ,selectedRow );
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
