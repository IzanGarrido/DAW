import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

public class CreaAeropuerto {
    public static void main(String[] args) {

        // Asigno las sentencias a variables Strings para que sea mas vistoso
        // id_vuelo e id_pasajero son autoicrementales, para que no haga falta ponerlo
        // manualmente.
        // Pongo el 'IF NOT EXISTS' por si vuelves a ejecutar el codigo, no salte error,
        // ya que las tablas ya estarían creadas.
        String TablaVuelos = "CREATE TABLE IF NOT EXISTS Vuelos (" +
                "id_vuelo INT AUTO_INCREMENT UNIQUE PRIMARY KEY," +
                "numero_vuelo VARCHAR(20) UNIQUE," +
                "origen VARCHAR(45)," +
                "destino VARCHAR(45)," +
                "fecha DATE  ," +
                "capacidad INT );";

        String TablaPasajeros = "CREATE TABLE IF NOT EXISTS Pasajeros (" +
                "id_pasajero INT AUTO_INCREMENT UNIQUE PRIMARY KEY," +
                "numero_pasaporte VARCHAR(20) UNIQUE," +
                "nombre_pasajero VARCHAR(15) );";

        // En esta tabla se unen las tablas Vuelos y Pasajeros con claves foraneas
        String TablaVuelo_Pasajeros = "CREATE TABLE IF NOT EXISTS Vuelos_Pasajeros (" +
                "id_vuelo INT," +
                "id_pasajero INT," +
                "n_asiento VARCHAR(5) UNIQUE ," +
                "PRIMARY KEY (id_vuelo, id_pasajero)," +
                "FOREIGN KEY (id_vuelo) REFERENCES Vuelos(id_vuelo)," +
                "FOREIGN KEY (id_pasajero) REFERENCES Pasajeros(id_pasajero) );";

        try {

            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:33006/Aeropuerto", "root",
                    "dbrootpass");
            Statement st = con.createStatement();
            // Aqui se crean las tablas.
            st.executeUpdate(TablaVuelos);
            st.executeUpdate(TablaPasajeros);
            st.executeUpdate(TablaVuelo_Pasajeros);
            
            con.close();

        } catch (SQLException e) {
            System.out.println("Error en la bd: " + e.getErrorCode() + "-" + e.getMessage());
        } catch (Exception e) {
            System.out.println("Otro error: " + e.getMessage());
        }

    }
}