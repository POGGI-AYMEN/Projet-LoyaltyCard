package com.pa;

import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;
import java.util.Objects;

public class WindowsController extends LogIn {


    public void windowSwitcher(String fxml) throws IOException
    {

        Parent root = FXMLLoader.load(Objects.requireNonNull(getClass().getResource(fxml)));
        Stage stg = getStg() ;
        stg.setResizable(false);
        stg.setTitle("LoyaltyCard");
        stg.setScene(new Scene(root, 1600, 900)) ;
        stg.centerOnScreen();
        stg.show();
    }




}
