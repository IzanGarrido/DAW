import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement ;

public class TestBDD {

    public static void main(String[] args) {

        try {
            // Conexión con la BD
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:33006/Chinook","root", "dbrootpass");
           // Creamos un objeto para enviar sentencias SQL a la BD
            Statement st = con.createStatement();
            // Ejecutamos la consulta SQL y obtenemos el resultado en ResultSet
            ResultSet rs = st.executeQuery("SELECT * FROM Album");
            // Recorremos los resultados obtenidos y mostramos sus campos
            while (rs.next()) {
                String nombre = rs.getString("Title");
                int edad = rs.getInt("AlbumId");
                System.out.println(nombre + ": " + edad);
            } 
            //int filas = st.executeUpdate("INSERT INTO Album (AlbumId, Title, ArtistId) VALUES (348, 'Grande Maxi', 100)");
            // Cerramos la conexión
            con.close();
        } catch (SQLException e) {
            System.out.println("Error en la bd: " + e.getErrorCode() + "-" + e.getMessage());
        } catch (Exception  e) {
            System.out.println("Otro error: " + e.getMessage());
        }
    
    }
}   