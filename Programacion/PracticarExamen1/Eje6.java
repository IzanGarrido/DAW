import java.util.Scanner;

public class Eje6 {
    
    public static void main (String[] args) {

        int base;
        int expo;
        int res;

        Scanner sc = new Scanner (System.in);

        System.out.print("Dame la base: ");
        base = sc.nextInt();        
        System.out.print("Dame el exponente: ");
        expo = sc.nextInt();

        res = 1;

        for (int i = 1; i<= expo; i++) {

            res = res * base;

        }

        System.out.println("Resultado = " + res);

        sc.close();

    }

}
