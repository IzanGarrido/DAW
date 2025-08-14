import java.util.Scanner;

public class Ejercicio6 {

    public static void main (String[] args) {

        Scanner sc = new Scanner (System.in);

        int dia1;
        int hora1;
        int dia2;
        int hora2;

        System.out.println("Introduce primera hora: ");
        System.out.print("Día: ");
        dia1 = sc.nextInt();
        System.out.print("Hora: ");
        hora1 = sc.nextInt();

        System.out.println("Introduce segunda hora: ");
        System.out.print("Día: ");
        dia2 = sc.nextInt();
        System.out.print("Hora: ");
        hora2 = sc.nextInt();

        if ((dia1 <= 7) && (dia2 > dia1 && dia2 <= 7)) {

            if (hora1 <= 23 & hora2 <= 23) {
    
                System.out.println("Entre las " + hora1 + ":00 horas del día " + dia1 + " y las " + hora2 + ":00 horas del día " + dia2 + " hay " + ((((dia2 - dia1)*24 )+ hora2 )-hora1) + " horas." );

            } 

        } else {

            System.out.println("Número incorrecto.");

        }

    }

}
