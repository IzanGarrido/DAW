import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

public class Copyline {
    public static void main(String[] args) {
        String linea;
        try {
            FileReader in = new FileReader("fuente.txt");
            //Usamos BufferedReader para poder leer lineas y no caracteres
            BufferedReader entrada = new BufferedReader(in);
            FileWriter out = new FileWriter("destino.txt");
            linea=entrada.readLine();
            while (linea != null) {
                out.write(linea);
                linea=entrada.readLine();
                out.flush(); //Guarda los datos en el fichero
            }
            in.close();
            out.close();
        } catch(FileNotFoundException e1) {
            System.err.println("Error: No se encuentra el fichero");
        } catch(IOException e2) {
            System.err.println("Error leyendo/escribiendo fichero");
        }
    }
}
