import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

public class Copycar {
    public static void copiaFichero() {
        
        int caracter;
        try {
            FileReader in = new FileReader("fuente.txt");
            // new FileWriter("archivo",true) para abrir en modo append
            FileWriter out = new FileWriter("destino.txt");
            caracter = in.read();
            while(  caracter != -1) {
                out.write(caracter);
                caracter = in.read();
            }
            in.close();
            out.close();
        } catch(FileNotFoundException e1) {
            System.err.println("Error: No se encuentra el fichero");
        } catch(IOException e2) {
            System.err.println("Error leyendo/escribiendo fichero");
        }
    }
        
        public static void main(String[] args) {
        copiaFichero();
    }
}