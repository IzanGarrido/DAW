module izanfx {
    requires javafx.controls;
    requires javafx.fxml;
    requires javafx.base;
    requires javafx.graphics;
    requires java.prefs;
    requires java.xml.bind;

    opens izanfx to javafx.fxml;
    exports izanfx;
}
