import libTiempo.Tiempo;
import java.util.ArrayList;
import java.util.Collections;

public class pruebaTiempo {
    public static void main(String[] args) {

        // PROBAR LA SUMA Y TOSTRING
        Tiempo t = new Tiempo(3, 20,10);
        Tiempo t2 = new Tiempo(4, 35,18);
        System.out.println("La suma de " + t.toString() + " + " + t2.toString() + "= " + t.suma(t2));
        System.out.println();

        // PROBAR LA RESTA Y TOSTRING
        t.set(4, 35,18);
        t2.set(3, 20,10);
        System.out.println("La resta de " + t.toString() + " - " + t2.toString() + "= " + t.resta(t2));
        System.out.println();

        // PROGRAMA PARA ORDENAR 
        ArrayList<Tiempo> ordenar = new ArrayList<>();

        ordenar.add(new Tiempo(15, 12, 3));
        ordenar.add(new Tiempo(8, 45, 30));
        ordenar.add(new Tiempo(18, 30, 15));
        ordenar.add(new Tiempo(12, 16, 43));
        ordenar.add(new Tiempo(5, 20, 45));
        ordenar.add(new Tiempo(22, 15, 10));
        ordenar.add(new Tiempo(9, 57, 2));
        ordenar.add(new Tiempo(14, 55, 22));
        ordenar.add(new Tiempo(20, 10, 5));
        ordenar.add(new Tiempo(6, 40, 18));

        System.out.println("Numeros ordenados de menor a mayor\n");
        Collections.sort(ordenar);
        int i = 1;
        for (Tiempo temp : ordenar) {
            System.out.printf("%2d: %s\n",i,temp.toString());
            i++;
        }
    }
}