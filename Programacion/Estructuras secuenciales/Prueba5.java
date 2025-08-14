import java.util.Scanner;

public class Prueba5 {
    
    public static void main(String[] args) {

        int n = 0;

        Scanner sc = new Scanner (System.in);

        do {

            System.out.print("Dame un número: ");
            n = sc.nextInt();
            System.out.println(n);

        }  while (n != 0);   

        System.out.println("Fin del programa");

    }
}
