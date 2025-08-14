import java.util.Scanner;

public class Ejercicio14 {
    
    public static void main(String[] args) {

        Scanner sc = new Scanner (System.in);

        int n;

        System.out.print("Dame un número: ");
        n = sc.nextInt();

        for (int i = 1; i <= n; i++) {
        
            for (int l = 1;l <= n-i; l++) {

                System.out.print(" ");

            }

            for (int j = 1;j <= i; j++) {

                System.out.print(j);

            }

            for (int k = i-1; k > 0; k--) {

                System.out.print(k);
            
            }

        System.out.print("\n");

        }

    }

}
