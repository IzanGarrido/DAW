import java.util.Scanner;

public class Ejercicio8 {

    public static void main(String [] args) {   
    
        Scanner sc = new Scanner (System.in);

        int a = 0;
        int b;

        b = (int) (Math.random()*5+1);

        System.out.print("Piedra(1), papel(2), tijeras(3), lagarto(4) o spock(5)? ");
        a = sc.nextInt();
        
        while (a > 5) {

            System.out.println("Número incorrecto, vuelve a introducirlo.");

            System.out.print("Piedra(1), papel(2), tijeras(3), lagarto(4) o spock(5)? ");
            a = sc.nextInt();

        }
        
        System.out.println("El oponente ha elegido " + b);
       
        if (a == 1 && (b == 2 || b == 5)) {

            System.out.println("Has perdido");

        } else if (a == 1 && (b == 3 || b == 4)) {

            System.out.println("Has ganado");

        } else if (a == 2 && (b == 1 || b == 5)) {

            System.out.println("Has ganado");

        } else if (a == 2 && (b == 3 || b == 4)) {

            System.out.println("Has perdido");

        } else if (a == 3 && (b == 1 || b == 5)) {

            System.out.println("Has perdido");

        } else if (a == 3 && (b == 2 || b == 4)) {

            System.out.println("Has ganado");

        } else if (a == 4 && (b == 1 || b == 3)) {

            System.out.println("Has perdido");

        } else if (a == 4 && (b == 2 || b == 5)) {

            System.out.println("Has ganado");

        } else if (a == 5 && (b == 1 || b == 3)) {

            System.out.println("Has ganado");

        } else if (a == 5 && (b == 2 || b == 4)) {

            System.out.println("Has perdido");

        } else if (a == b) {

            System.out.println("Empate");

        }

    }
    
}
