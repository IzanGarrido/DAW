import java.util.Scanner;

public class Eje7 {
    
public static void main (String[] args) {

    int n;
    int digitos = 0;

    Scanner sc = new Scanner (System.in);

    System.out.print("Dame un número de hasta 6 dígitos: ");
    n = sc.nextInt();

    Math.abs(n);

    if (n < 10) {

        digitos = 1;

    } else if (n < 100 ) {

        digitos = 2;

    } else if (n < 1000) {

        digitos = 3;

    } else if (n < 10000) {

        digitos = 4;

    } else if (n<100000) {

        digitos = 5;

    } else if (n < 1000000) {

        digitos = 6;

    } else {

        System.out.println("Número incorrecto.");

    }

    System.out.println("El número de digitos es: " + digitos);

    sc.close();

}

}
