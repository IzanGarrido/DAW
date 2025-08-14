import java.util.Scanner;
import java.util.ArrayList;

public class Demo {
    
    public static void menu () {

        System.out.println(
           "1.- Crear pedido\n" +
           "2.- Crear devolucion\n" +
           "3.- Crear reclamacion\n" +
           "4.- Cerrar reclamación\n" +
           "5.- Imprimir formulario por ID\n" +
           "6.- Imprimir todas las reclamaciones\n" +
           "7.- Imprimir todos los formularios\n" +
           "0.- Salir"
        );
    }

    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);
        ArrayList<Pedidos> listaform = new ArrayList<>();
        ArrayList<Reclamaciones> listarec = new ArrayList<>();
        String nombre;
        String producto;
        String texto;
        double precio;
        int contf = 0;
        int contr = 0;
        int id;
        int opcion;
        do {
            menu();
            System.out.print("Opcion: ");
            opcion = sc.nextInt();
            switch (opcion) {
                case 1:
                    System.out.print("Nombre: ");
                    nombre = sc.next();
                    System.out.print("Producto: ");
                    producto = sc.next();
                    System.out.print("Precio: ");
                    precio = sc.nextDouble();
                    listaform.add(new Pedidos(nombre,producto,precio));
                    System.out.println(listaform.get(contf).toStringid());
                    contf++;
                    break;
                case 2:
                    System.out.print("Nombre: ");
                    nombre = sc.next();
                    System.out.print("Producto: ");
                    producto = sc.next();
                    System.out.print("Precio: ");
                    precio = sc.nextDouble();
                    listaform.add(new Devoluciones(nombre,producto,precio));
                    System.out.println(listaform.get(contf).toStringid());
                    contf++;
                    break;
                case 3:
                    System.out.print("Nombre: ");
                    nombre = sc.next();
                    System.out.print("Texto: ");
                    texto = sc.next();
                    listarec.add(new Reclamaciones(nombre,texto));          
                    System.out.println(listarec.get(contr).toStringid());
                    contr++;        
                    break;
                case 4:
                    System.out.print("Id reclamación: ");
                    texto = sc.next();
                    String[] a = texto.split("E");
                    id = Integer.parseInt(a[1]) - 1;
                    listarec.get(id).cierra();

                    break;
                case 5:
                    System.out.print("Id formulario: ");
                    texto = sc.nextLine();
                    String[] b = texto.split("E");
                    id = Integer.parseInt(b[1]) - 1;
                    System.out.println( listarec.get(id).toString());
                    break;
                case 6:
                    for (Reclamaciones r : listarec) {
                        System.out.println( r.toString());
                    }
                    break;
                case 7:
                    for (Pedidos r : listaform) {
                        System.out.println( r.toString());
                    }
                    for (Reclamaciones r : listarec) {
                        System.out.println( r.toString());
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