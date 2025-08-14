import java.util.Scanner;

public class Eje4 {
    
    public static void main(String[] args) {

        final int TIEMPO = 10;
        int hcazuela;
        int hcocer;
        
        Scanner sc = new Scanner (System.in);

        System.out.print("Cuantos huevos vas a cocer? ");
        hcocer = sc.nextInt();
        System.out.print("Cuantos huevos caben en la cazuela? ");
        hcazuela = sc.nextInt();

        System.out.printf("\nTIEMPO TOTAL : %d \n", (int)((hcocer + hcazuela - 1)/hcazuela)*TIEMPO );

        sc.close();

    }

}
