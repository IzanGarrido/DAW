import java.util.Scanner;

public class Prueba3 {
    
    public static void main(String[] args) {

        int h;

        Scanner sc = new Scanner(System.in);

        System.out.print("Que hora es? ");
        h = sc.nextInt();

        if (h >= 8 & h <= 12) {

            System.out.println("Buenos días.");

        } else if (h >= 13 & h <= 21 ) {

            System.out.println("Buenas tardes.");

        } else if (h >= 22 & h <= 24) {

            System.out.println("Buenas noches.");

        } else if (h >= 1 & h <= 7) {

            System.out.println("Buenas noches.");

        }
    }
}
