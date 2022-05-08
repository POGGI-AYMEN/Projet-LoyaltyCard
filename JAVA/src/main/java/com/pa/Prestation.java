package com.pa;

import javafx.event.ActionEvent;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

import static com.pa.Main.getStg;

public class Prestation  {
    private int companyId;

    private String entreprise ;

    public void setData(int companyId, String entreprise) {
        this.companyId = companyId;
        System.out.println(this.companyId);
        this.entreprise = entreprise ;
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













