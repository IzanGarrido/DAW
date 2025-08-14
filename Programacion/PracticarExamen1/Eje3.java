import java.util.Scanner;


public class Eje3 {
    public static void main(String[] args) {

        float a, b, c;
        double raiz;

        Scanner sc = new Scanner (System.in);

        System.out.print("Dame a: ");
        a = sc.nextFloat();
        System.out.print("Dame b: ");
        b = sc.nextFloat();
        System.out.print("Dame c: ");
        c = sc.nextFloat();

        raiz = Math.sqrt(b * b - 4 * a * c);

        System.out.printf("x1 = %3.2f \n", (- b + raiz) / 2 * a);
        System.out.printf("x2 = %3.2f \n", (- b - raiz)/ 2 * a);

        sc.close();

    }


}
