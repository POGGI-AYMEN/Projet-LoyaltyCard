module com.pa {
    requires javafx.controls;
    requires javafx.fxml;
    requires json;


    opens com.pa to javafx.fxml;
    exports com.pa;
}