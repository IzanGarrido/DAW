import java.util.Scanner;

public class Ejercicio2 {
 
    public static void main(String[] args) {

        Scanner sc = new Scanner (System.in);

        int base;
        int exponente;
        int potencia;

        System.out.print("Dame la base: ");
        base = sc.nextInt();

        System.out.print("Dame el exponente: ");
        exponente = sc.nextInt();

        potencia = 1;
        
        for (int i = 1; i <= exponente; i++) {

            potencia = potencia * base;
            
        }

        System.out.println(potencia);

        sc.close();

    }  

}