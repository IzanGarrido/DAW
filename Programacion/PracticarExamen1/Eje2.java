import java.util.Scanner;

public class Eje2 {

    public static void main (String[] args) {

        float peso;
        float altura;
        float res;

        Scanner sc = new Scanner (System.in);

        System.out.print("Dame tu peso: ");
        peso = sc.nextFloat();
        
        System.out.print("Dame tu altura: ");
        altura = sc.nextFloat();

        res = peso / (altura*altura);

        System.out.printf("Tu IMC es: %.2f", res);

        sc.close();

    }
    
}
