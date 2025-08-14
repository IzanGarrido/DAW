import java.util.Scanner;

public class Eje1 {

    public static void main(String[] args) {

        int n;

        Scanner sc = new Scanner (System.in);

        do {
        System.out.print("Dame un numero: ");
        n = sc.nextInt();

        System.out.println("Tabla de multiplicar del " + n + ":\n");
        System.out.printf("%d x  1 = %3d \n",n, n * 1);
        System.out.printf("%d x  2 = %3d \n",n, n * 2);
        System.out.printf("%d x  3 = %3d \n",n, n * 3);
        System.out.printf("%d x  4 = %3d \n",n, n * 4);
        System.out.printf("%d x  5 = %3d \n",n, n * 5);
        System.out.printf("%d x  6 = %3d \n",n, n * 6);
        System.out.printf("%d x  7 = %3d \n",n, n * 7);
        System.out.printf("%d x  8 = %3d \n",n, n * 8);
        System.out.printf("%d x  9 = %3d \n",n, n * 9);
        System.out.printf("%d x 10 = %3d \n",n, n * 10);
        
        } while (n != 0);

        sc.close();

    }

}