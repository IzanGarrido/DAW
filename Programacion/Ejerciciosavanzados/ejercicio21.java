import java.util.Scanner;

public class ejercicio21 {
    public static void main(String[] args) {

        int numero;

        Scanner sc = new Scanner(System.in);
            
        System.out.print("intruduce un numero del 1 al 9");
        numero = sc.nextInt();

        System.out.printf("%d x  1 = %3d \n", numero, numero * 1 );
        System.out.printf("%d x  2 = %3d \n", numero, numero * 2 );
        System.out.printf("%d x  3 = %3d \n", numero, numero * 3 );
        System.out.printf("%d x  4 = %3d \n", numero, numero * 4 );
        System.out.printf("%d x  5 = %3d \n", numero, numero * 5 );
        System.out.printf("%d x  6 = %3d \n", numero, numero * 6 );
        System.out.printf("%d x  7 = %3d \n", numero, numero * 7 );
        System.out.printf("%d x  8 = %3d \n", numero, numero * 8 );
        System.out.printf("%d x  9 = %3d \n", numero, numero * 9 );
        System.out.printf("%d x 10 = %3d \n", numero, numero * 10 );
        
    }
}

