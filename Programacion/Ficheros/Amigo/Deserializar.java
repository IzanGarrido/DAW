import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.ObjectInputStream;

public class Deserializar {
    public static void main(String[] args) {
        File f = new File("amigos.bin");
        
        try {
            FileInputStream fis = new FileInputStream(f);
            ObjectInputStream ois = new ObjectInputStream(fis);
            System.out.println("Listado de amigos en el fichero:");
            Amigo a3 = (Amigo)ois.readObject();
            a3.datosAmigo();
            Amigo a4 = (Amigo)ois.readObject();
            a4.datosAmigo();
            ois.close();
            fis.close();
        } catch (IOException e) {
            System.out.println("Excepción: "+e.getMessage());
        } catch (ClassNotFoundException e2) {
            System.out.println("Excepción: "+e2.getMessage());
        }
        
    }
}