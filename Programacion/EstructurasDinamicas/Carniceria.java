import java.util.Queue;
import java.util.LinkedList;
import java.util.Iterator;
import java.util.Scanner;
public class Carniceria {
    public static void main(String[] args) {
        Queue<String> cola = new LinkedList<String>();
        int opcion;
        String cliente;

        Scanner sc = new Scanner(System.in);
        System.out.print("\033[H\033[2J");
        System.out.flush();
        do {
            System.out.println();
            System.out.println( "1. Nuevo cliente ha entrado\r\n" + 
                                "2. Atender al siguiente cliente\r\n" + 
                                "3. Mostrar cola actual\r\n" + 
                                "0. Salir"                              );
            System.out.print("Elige una opción: ");
            opcion = sc.nextInt();

            switch (opcion) {
                case 1:
                    System.out.print("\033[H\033[2J");
                    System.out.flush();
                    System.out.print("Nombre del siguiente cliente: ");
                    cliente = sc.next();
                    cola.add(cliente);
                    System.out.printf("Tiene %2d cliente delante\n",cola.size() - 1);

                    break;

                case 2:
                    System.out.print("\033[H\033[2J");
                    System.out.flush();
                    System.out.println("Le toca a " + cola.peek());
                    cola.poll();
                    break;
                case 3:
                    System.out.print("\033[H\033[2J");
                    System.out.flush();
                    Iterator<String> itq = cola.iterator();
                    int i = 1;
                    while (itq.hasNext()) {
                        System.out.println(i + " " + itq.next());
                        i++;
                    }
                    break;
                case 0:

                    break;
            
                default:    
            }
        } while (opcion != 0);
        sc.close();
    }
}