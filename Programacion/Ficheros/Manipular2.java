import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class Manipular2 {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String nombre;
        String contra;
        while (true) {
            try {
                FileWriter pw = new FileWriter("Users.txt",true);
                nombre = sc.nextLine();
                contra = sc.nextLine();
                pw.write(nombre + " : " + contra + "\n");
                pw.close();
                
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}