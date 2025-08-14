import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;

public class Compusu {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        String usu;
        String contra;
        String linea = " ";
        boolean existe = true;

        try {
            FileReader fr = new FileReader("Users.txt");
            BufferedReader br = new BufferedReader(fr);

            System.out.print("Dame el nombre de usuario: ");
            usu = sc.nextLine();

            System.out.print("Dame la contraseña: ");
            contra = sc.nextLine();

            linea = br.readLine();
            while (linea !=null) {

                if (linea.equals(usu + " : " + contra)) {
                    System.out.println("El usuario y contraseña son correctos.");
                    existe = false;
                }

                linea = br.readLine();
            }

            br.close();
            fr.close();

            if (existe) {
                System.out.println("El usuario o contraseña no son correctos");
            }

        } catch(IOException e) {
            e.printStackTrace();
        }

    }
}