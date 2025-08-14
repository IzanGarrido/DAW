import java.io.File;
//import java.io.IOException;
import java.util.Scanner;

public class Fich {

    public static void listarDirectorio(){
        String ruta;
        Scanner sc = new Scanner(System.in);
        System.out.print("Ruta: ");
        ruta=sc.nextLine();
        if(ruta.length() > 0) {
            File f = new File(ruta);
            if(f.isDirectory()) { 
                File[] ficheros = f.listFiles();
                System.out.println("Listado de los ficheros");
                for(File file : ficheros) System.out.println("\t" + file.getName());
            }
        }
        sc.close();
    }


    public static void main(String[] args) {
        listarDirectorio();
    }
}