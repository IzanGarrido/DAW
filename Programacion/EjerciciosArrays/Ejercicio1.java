import java.util.Scanner;

public class Ejercicio1 {

    public static void main(String[] args) {

        Scanner sc = new Scanner (System.in); 

        int[] n = new int[15];
        int a = 0;

        for (int i = 0; i < 15; i++) {

            System.out.print("Dame un numero para la posición " + i + ": ");
            n[i] = sc.nextInt();
                
        }

        System.out.println("Posición 0: " + n[14]);

        for (int i = 0; i<14; i++) {
            
            a = i+1;
            System.out.println("Posición " +  a + ": " + n[i]);

        }  

        sc.close();

    }

}