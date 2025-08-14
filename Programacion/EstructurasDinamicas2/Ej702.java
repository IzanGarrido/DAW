import java.util.Scanner;
import java.util.LinkedList;
public class Ej702 {

    public static int cortar (String fecha) {
        int cortado = Integer.parseInt(fecha = fecha.substring(fecha.length() -2, fecha.length()));
        return cortado;
    }
    public static void main(String[] args) {
        
        LinkedList<Integer> cuenta = new LinkedList<Integer>();
        String fecha;
        int cant;
        int temp;
        int Lfecha;
        int dinero;
        int casos;

        Scanner sc = new Scanner(System.in);

        dinero = sc.nextInt();
        casos = sc.nextInt();

        for (int i = 0; i < 12; i++) {
            cuenta.add(i, 0);
        }
        for (int i = 0; i < casos; i++) {
            fecha = sc.next();
            cant = sc.nextInt();
            sc.nextLine();
            Lfecha = cortar(fecha);
            temp = cuenta.get(Lfecha - 1) + (cant);
            cuenta.remove(Lfecha - 1);
            cuenta.add(Lfecha - 1, temp);
            
        }
        for (int i = 0; i < cuenta.size(); i++) {
            temp = cuenta.get(i);
            cuenta.remove(i);
            cuenta.add(i, dinero + temp);
            dinero = cuenta.get(i);

        }
        for (int nums : cuenta) {
            System.out.print(nums + " ");
        }
        sc.close();
    }
}