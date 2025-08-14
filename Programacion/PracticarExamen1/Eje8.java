import java.util.Scanner;

public class Eje8 {
    
    public static void main (String[] args) {

        int n;
        int cont;
        boolean primo;

        Scanner sc = new Scanner (System.in);

        System.out.println("Dime un número: ");
        n = sc.nextInt();

        n= Math.abs(n);

        cont = n - 1;

        if (n == 0 || n == 1) primo = false;

        else primo = true;

        while (primo && cont > 1) {

            if (n%cont == 0) primo = false;
            cont --;

        }
        
        System.out.println(primo?"Es primo":"No primo");

    }

}
