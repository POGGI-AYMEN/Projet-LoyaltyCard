package com.pa;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.util.Objects;

public class Main extends Application {

    private static Stage stg;

    public static Stage getStg() {
        return stg;
    }

    @Override
    public void start(Stage primaryStage) throws Exception {
        stg = primaryStage;
        primaryStage.setResizable(false);
        Parent root = FXMLLoader.load(Objects.requireNonNull(getClass().getResource("log_in.fxml")));
        primaryStage.setTitle("LoyaltyCard");
        primaryStage.setScene(new Scene(root, 800, 470));
        primaryStage.show();
    }


    public static void main(String[] args) {
        launch(args);
    }
}