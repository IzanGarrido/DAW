import java.util.Scanner;

public class Prueba1 {

    public static void main(String[] args) {

        int n1 = 1;
        int n2 = 2;

        Scanner sc = new Scanner (System.in);

        System.out.print("Primer numero: ");
        n1 = sc.nextInt();
        System.out.print("Segundo numero: ");
        n2 = sc.nextInt();

        System.out.println("El primer numero es "+n1);
        System.out.println("El segundo numero es "+n2);

    }

}