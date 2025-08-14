import java.util.Scanner;

public class Ejercicio3 {
    
    public static void main(String[] args) {

         Scanner sc = new Scanner (System.in);

        int n;
        int Digitos;

        System.out.print("Dame un número positivo o negativo de hasta 6 digitos: ");
        n = sc.nextInt();

        Digitos = 0;

        n = Math.abs(n);

        if (n == 0) {

            Digitos = 1;

        } else {

            for (Digitos = 0; n > 0; Digitos++) {

                n = n/10;

            }
            
        }

        if (Digitos > 0 && Digitos < 7) {
        
        System.out.println("El número de digitos es " + Digitos + ".");

        } else if (Digitos > 6) {

            System.out.print("Número incorrecto.");

        }

        sc.close();

    }

}