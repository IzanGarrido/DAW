import java.util.Scanner;

public class Ejercicio7 {

    public static void main (String[] args) {

        Scanner sc = new Scanner (System.in);

        int a;
        int b;

        b = (int) (Math.random()*3+1);

        System.out.print("Piedra(1), papel(2) o tijeras(3)? ");
        a = sc.nextInt();
        
        while (a > 3) {

            System.out.println("Número incorrecto, vuelve a introducirlo.");

            System.out.print("Piedra(1), papel(2) o tijeras(3)? ");
            a = sc.nextInt();

        }
        
        System.out.println("El oponente ha elegido " + b);
       
        if (a == 1 && b == 2) {

            System.out.println("Has perdido");

        } else if (a == 1 && b == 3) {

            System.out.println("Has ganado");

        } else if (a == 2 && b == 1) {

            System.out.println("Has ganado");

        } else if (a == 2 && b == 3) {

            System.out.println("Has perdido");

        } else if (a == 3 && b == 1) {

            System.out.println("Has perdido");

        } else if (a == 3 && b == 2) {

            System.out.println("Has ganado");

        } else if (a == b) {

            System.out.println("Empate");

        }

    }
    
}