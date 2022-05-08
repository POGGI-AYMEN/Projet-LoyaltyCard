package com.pa;

import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

public class EditArticle {
    private Stage stage;
    private String entreprise;
    private String articleCode;
    private int companyId;


    @FXML
    private Label error ;
    @FXML
    private TextArea descreption;

    @FXML
    private TextField price;

    @FXML
    private TextField quantity;

    @FXML
    private Button uodate;

    public void update()
    {
        String prix = price.getText() ;
        String number = quantity.getText() ;
        String disc = descreption.getText() ;

        if (prix.isEmpty() && number.isEmpty() && disc.isEmpty())
        {
            error.setText("Merci de remplire tous les champs");
        }
    }


    public void setData(int companyId, String entreprise, Stage stage, String selectedRow) {
        this.companyId = companyId;
        this.stage = stage;
        this.entreprise = entreprise;
        this.articleCode = selectedRow;

    }
}



