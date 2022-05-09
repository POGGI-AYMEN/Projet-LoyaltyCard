package com.pa;

import com.github.tsohr.JSONArray;
import com.github.tsohr.JSONException;
import com.github.tsohr.JSONObject;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class UsersList  {
    private String prestID ;

    @FXML
    private TableColumn<User, String> ClientsName;

    @FXML
    private TextField search;

    @FXML
    private TableColumn<User, Integer> userId;

    @FXML
    private TableView<User> usersView;

    private ObservableList<User> users ;



    public void getData() throws IOException {
        StringBuilder result = new StringBuilder();
        URL url = new URL("http://localhost/API/liste_users.php?id=" + this.prestID);
        HttpURLConnection conn = (HttpURLConnection) url.openConnection();
        conn.setRequestMethod("GET");
        users = FXCollections.observableArrayList() ;
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
                        User usr = new User(data.getJSONObject(i).getInt("client") , data.getJSONObject(i).getString("name")) ;

                        users.add(usr) ;


                    }

                } catch (JSONException e)
                {

                }



            }
        }

    }
    public void getRows() throws IOException {
        getData();

        userId.setCellValueFactory(new PropertyValueFactory<>("client"));
        ClientsName.setCellValueFactory(new PropertyValueFactory<>("name"));


        usersView.setItems(users);
    }


    public void setData(String selectedRow) throws IOException {
        this.prestID = selectedRow ;

        getRows();



    }



}
