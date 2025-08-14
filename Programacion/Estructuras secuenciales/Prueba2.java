import java.util.Scanner;

public class Prueba2 {
    
    public static void main (String[] args){

        int edad;

        Scanner sc = new Scanner (System.in);
        System.out.print("Cual es tu edad? ");
        edad = sc.nextInt();

        if (edad>=18) {

            System.out.println("Es mayor de edad");

        } else if (edad<18) {

            System.out.println("No es mayor de edad");

        }       
    }
}
 