import java.util.Scanner;

public class Ejercicio13 {
    
    public static void main (String[] args) {

        Scanner sc = new Scanner (System.in);

        int n;
        int intento = 0;

        n = (int) (Math.random()*100+1);

        for (int i = 5; i != 0 && intento != n; i--) {

            System.out.println("Quedan " + i + " intentos.");
            System.out.print("Introduce un número del 1 al 100: ");
            intento = sc.nextInt();

            if (intento < n) {

                System.out.println("El número introducido es menor que el número secreto.");

            } else if (intento > n) {

                System.out.println("El número introducido es mayor que el número secreto.");

            }

        }

        if (intento == n) {

            System.out.println("Has ganado.");

        } else {

            System.out.println("Has perdido.");

        }
        System.out.print("El número secreto era " + n + ".");

    }

}
