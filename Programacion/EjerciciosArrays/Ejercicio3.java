import java.util.Scanner;

public class Ejercicio3 {
    
    public static void main(String[] args) {

        int[][] sim = new int [4][4];
        boolean simetrico = true;

        Scanner sc = new Scanner (System.in); 

        for (int i = 0; i < 4; i++) {
            //Asignar nums a la matriz
            for (int j = 0; j <4; j++) {

                System.out.print("Dame un numero para " + i + " " + j + ": ");
                sim[i][j] = sc.nextInt();
                          
            }

        }
        // Pintar la matriz
        for (int i = 0; i < 4; i++) {

            System.out.print("  ");
            
            for (int j = 0; j <4; j++) {

                System.out.print(sim[i][j]);
                System.out.print("  ");

            }

        System.out.println();

        }

        for (int i = 0; i < 4; i++) {

            System.out.print("  ");
            
            for (int j = 0; j <4; j++) {

                if (sim[i][j] != sim[j][i]) simetrico = false;

            }

        }

        System.out.println(simetrico?"Simetrico":"No simetrico");
        sc.close();

    }

}