import java.io.FileInputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.util.InputMismatchException;
import java.util.Scanner;

public class Leebin {

    public static void menu(){
        System.out.println("\n        MENU         \n" +
                           "1. Nombre del objeto.\n" +
                           "2. Constelación.\n"      +
                           "3. Magnitud límite.\n"   +
                           "4. Salir."                 );

    }
    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);
        boolean bucle = true;

        while (bucle) {
            menu();
            int opcion;
            String cosa;
            Double mag;
            try {
                FileInputStream fis = new FileInputStream("SAC.bin");
                ObjectInputStream ois = new ObjectInputStream(fis);
                System.out.print("Elige tu opción: ");
                switch (opcion = sc.nextInt()) {
                    case 1:
                        System.out.print("Nombre del Objeto: ");
                        cosa = sc.next(); 
                        Espacio miEspacio = (Espacio)ois.readObject();
                        while (miEspacio != null) {
                            if(miEspacio.getObject().equals(cosa)) {
                                System.out.println(miEspacio.toStringobj());
                                miEspacio = (Espacio)ois.readObject();
                            } else {
                                miEspacio = (Espacio)ois.readObject();
                            }
                        }
                       
                       break;
                    case 2:
                        System.out.print("Nombre de la constelación: ");
                        cosa = sc.next(); 
                        miEspacio = (Espacio)ois.readObject();
                        while (miEspacio != null) {
                            if(miEspacio.getCon().equals(cosa)) {
                                System.out.println(miEspacio.toStringcon());
                                miEspacio = (Espacio)ois.readObject();
                            } else {
                                miEspacio = (Espacio)ois.readObject();
                            }
                        }

                        break;
                    case 3:
                        System.out.print("Numero de magnitud: ");
                        mag = sc.nextDouble(); 
                        miEspacio = (Espacio)ois.readObject();
                        while (miEspacio != null) {
                            if(Double.parseDouble(miEspacio.getmag()) <= mag) {
                                System.out.println(miEspacio.toStringmag());
                                miEspacio = (Espacio)ois.readObject();
                            } else {
                                miEspacio = (Espacio)ois.readObject();
                            }
                        }

                        break;
                     case 4:
                        bucle = false;
                        System.out.println("Adios!");
                        break;
                
                    default:
                        System.out.println("Opción incorrecta.");
                        break;
                }
                ois.close();
                fis.close();
            } catch (IOException e) {
                System.out.println("Error al leer el archivo.");
            } catch (ClassNotFoundException e) {
                System.out.println("Clase no encontrada en el archivo.");
            } catch (InputMismatchException e) {
                System.out.println("No puedes poner un caracter.");
            }
            sc.nextLine();
            
        }

    }
}