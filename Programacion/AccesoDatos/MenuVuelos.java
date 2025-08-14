import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.InputMismatchException;
import java.util.Scanner;

public class MenuVuelos {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        int opcion;
        boolean salir = true;
        // Variables a usar
        int id_vuelo;
        int numero_vuelo;
        String origen;
        String destino;
        String fecha;
        int capacidad;
        int id_pasajero;
        String numero_pasaporte;
        String nombre_pasajero;
        String n_asiento;

        while (salir) {

            try {

                Connection con = DriverManager.getConnection("jdbc:mysql://localhost:33006/Aeropuerto", "root",
                        "dbrootpass");
                Statement st = con.createStatement();

                System.out.print("\033[H\033[2J");
                System.out.println("1. Alta Vuelo\n" +
                        "2. Alta Pasajero\n" +
                        "3. Reserva Vuelo\n" +
                        "4. Modificar reserva\n" +
                        "5. Baja reserva\n" +
                        "6. Salir");

                System.out.print("Opción: ");
                switch (opcion = sc.nextInt()) {

                    case 1:
                        System.out.println();
                        System.out.print("Número vuelo: ");
                        numero_vuelo = sc.nextInt();

                        System.out.print("Origen: ");
                        origen = sc.next();

                        System.out.print("Destino: ");
                        destino = sc.next();

                        System.out.print("Fecha (aaaa-mm-dd): ");
                        fecha = sc.next();

                        System.out.print("Capacidad: ");
                        capacidad = sc.nextInt();

                        st.executeUpdate("INSERT INTO Vuelos (numero_vuelo, origen, destino, fecha, capacidad) " +
                                "VALUES ('" + numero_vuelo + "', '" + origen + "', '" + destino + "', '" + fecha
                                + "', '" + capacidad + "');");

                        break;

                    case 2:
                        System.out.println();
                        System.out.print("Número pasaporte: ");
                        numero_pasaporte = sc.next();

                        System.out.print("Nombre pasajero: ");
                        nombre_pasajero = sc.next();

                        st.executeUpdate("INSERT INTO Pasajeros (numero_pasaporte, nombre_pasajero) " +
                                "VALUES ('" + numero_pasaporte + "', '" + nombre_pasajero + "');");

                        break;

                    case 3:
                        // MUESTRO LA TABLA VUELOS
                        System.out.println();
                        ResultSet rs = st.executeQuery("SELECT * FROM Vuelos");
                        System.out.println("TABLA VUELOS.");
                        while (rs.next()) {
                            id_vuelo = rs.getInt("id_vuelo");
                            numero_vuelo = rs.getInt("numero_vuelo");
                            origen = rs.getString("origen");
                            destino = rs.getString("destino");
                            fecha = rs.getString("fecha");
                            capacidad = rs.getInt("capacidad");
                            System.out.println(id_vuelo + " : " + numero_vuelo + " : " + origen + " : " + destino
                                    + " : " + fecha + " : " + capacidad);
                        }
                        // MUESTRO LA TABLA PASAJEROS
                        System.out.println();
                        rs = st.executeQuery("SELECT * FROM Pasajeros");
                        System.out.println("TABLA PASAJEROS.");
                        while (rs.next()) {
                            id_pasajero = rs.getInt("id_pasajero");
                            numero_pasaporte = rs.getString("numero_pasaporte");
                            nombre_pasajero = rs.getString("nombre_pasajero");
                            System.out.println(id_pasajero + " : " + numero_pasaporte + " : " + nombre_pasajero);
                        }

                        // AGREGO UNA RESERVA
                        System.out.println();
                        System.out.print("Id vuelo: ");
                        id_vuelo = sc.nextInt();
                        System.out.print("Id pasajero: ");
                        id_pasajero = sc.nextInt();
                        System.out.println("Numero de asiento");
                        n_asiento = sc.next();

                        st.executeUpdate("INSERT INTO Vuelos_Pasajeros (id_vuelo, id_pasajero, n_asiento) " +
                                "VALUES ('" + id_vuelo + "', '" + id_pasajero + "', '" + n_asiento + "');");

                        break;

                    case 4:

                        System.out.println();
                        rs = st.executeQuery("SELECT * FROM Vuelos_Pasajeros");
                        // MUESTRO LA TABLA VUELOS_PASAJEROS
                        System.out.println("TABLA DE VUELOS_PASAJEROS");
                        while (rs.next()) {
                            id_vuelo = rs.getInt("id_vuelo");
                            id_pasajero = rs.getInt("id_pasajero");
                            n_asiento = rs.getString("n_asiento");
                            System.out.println(id_vuelo + " : " + id_pasajero + " : " + n_asiento);
                        }

                        System.out.println();
                        System.out.println("Modificar fila:");
                        System.out.print("ID Vuelo: ");
                        id_vuelo = sc.nextInt();
                        System.out.print("ID Pasajero:");
                        id_pasajero = sc.nextInt();
                        System.out.print("Nuevo asiento: ");
                        n_asiento = sc.next();

                        st.executeUpdate(
                                "UPDATE Vuelos_Pasajeros SET n_asiento = '" + n_asiento + "' WHERE id_vuelo = "
                                        + id_vuelo + " AND id_pasajero = " + id_pasajero);

                        break;

                    case 5:
                        System.out.println();
                        rs = st.executeQuery("SELECT * FROM Vuelos_Pasajeros");
                        // MUESTRO LA TABLA VUELOS_PASAJEROS
                        System.out.println("TABLA DE VUELOS_PASAJEROS");
                        while (rs.next()) {
                            id_vuelo = rs.getInt("id_vuelo");
                            id_pasajero = rs.getInt("id_pasajero");
                            n_asiento = rs.getString("n_asiento");
                            System.out.println(id_vuelo + " : " + id_pasajero + " : " + n_asiento);
                        }
                        System.out.println();
                        System.out.print("Asiento de la reserva que quieres eliminar: ");
                        n_asiento = sc.next();

                        st.executeUpdate("DELETE FROM Vuelos_Pasajeros WHERE n_asiento = '" + n_asiento + "';");

                        break;

                    case 6:
                        salir = false;
                        System.out.println("Saliendo.");
                        break;

                    default:
                        System.out.println("Opción invalida");
                        break;
                }

                con.close();

            } catch (SQLException e) {
                System.out.println("Error en la bd: " + e.getErrorCode() + "-" + e.getMessage());
            } catch (InputMismatchException e) {
                System.out.println("Solo números");
            } finally {

                // ESTO SIRVE PARA HACER UN PAUSE DE 4000 milisegundos con cuenta regresiva
                try {
                    System.out.print("Selecciona otra opción en ");
                    for (int i = 4; i > 0; i--) {
                        System.out.print(i + " ");
                        Thread.sleep(1000);

                    }
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }

            sc.nextLine();
        }
    }
}