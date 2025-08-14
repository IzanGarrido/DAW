import java.io.File;
import java.io.IOException;
public class rmj {
    public static void main(String[] args) {
        

        try {
            File f = new File(args [0]);
            if (f.createNewFile()){
                System.out.println("Fichero creado: " + f.getName());
            } else if (f.mkdir()) {
                throw new Exception("Es un directorio.");
            }else {
                System.out.println("El fichero ya existe");
            }
            if (f.mkdir()) ;
        } catch (IOException e) {
            System.out.println("A");
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }


    }    
}