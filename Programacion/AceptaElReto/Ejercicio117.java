import java.util.Scanner;

public class Ejercicio117 {
    public static void main(String[] args) {

        int n;
        int i;
        String p;

        Scanner sc = new Scanner(System.in);

        System.out.print("Cuantas personas que Tinin no conoce han venido: ");
        n = sc.nextInt();

        if (n > 0) {
            for (i = 0 ; i < n; i++) {

                System.out.print("Soy ");
                p = sc.next();

                System.out.println("Hola, " + p + ".");

            }

            

        }

    }

}
