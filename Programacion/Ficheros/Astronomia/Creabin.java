import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.IOException;
import java.io.ObjectOutputStream;
import java.io.Serializable;

public class Creabin implements Serializable{
    public static void main(String[] args) {

        File f2 = new File("SAC.bin");
        try {
            File f = new File("SAC_DeepSky_Ver81_QCQ.TXT");
            FileReader fr = new FileReader(f);
            BufferedReader br = new BufferedReader(fr);

            FileOutputStream fs = new FileOutputStream(f2);
            ObjectOutputStream oos = new ObjectOutputStream(fs);
            
            String linea;
            while((linea= br.readLine()) != null) {
                String linea2 = linea.replaceAll(" ", "").replaceAll("\"", "");
                String[] a = linea2.split(",");
                if (linea.contains("GALXY")) {
                    
                    Espacio miEspacio = new Espacio(a[0], a[3], a[4], a[5], a[6]);
                    oos.writeObject(miEspacio);      
                    oos.flush();
                }
            }
            br.close();
            fr.close();
            oos.close();
             
        } catch (FileNotFoundException e)  {
            e.getMessage();
        } catch(IOException e2) {
            e2.getMessage();
        }
            
    }   
}