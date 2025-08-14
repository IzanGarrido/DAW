import java.util.Scanner;

public class Eje2 {
    
    public static void main(String[] args) {

        int[] numeros = new int[5];
        int[] estrellas = new int[2];
        int apuesta;
      
        Scanner sc = new Scanner(System.in);

        System.out.print("Numero de apuestas? ");
        apuesta = sc.nextInt();

        for (int i = apuesta; i > 0; i--) {

            for (int j = 0; j < 5; j++) {

                numeros[j] = (int)(Math.random()*50+1);
                System.out.printf("%02d ", numeros[j]);
            
            }

            System.out.print("+ ");

            for (int j = 0; j < 2; j++) {

                estrellas[j] = (int)(Math.random()*10+1);
                System.out.printf("%02d ", estrellas[j]);

            }

        System.out.println();

        }

        sc.close();

    }

}
