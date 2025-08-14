public class Ejercicio32 {

    public static void main(String[] args) {

        int[][] a = new int [3][3];
        
        int b = 0;

        for (int i = 0; i<=2; i++) {

            for (int j = 0; j<=2; j++) {

                b++;
                a[i][j] = b;

            }
        }

        for (int i= 0; i<=2; i++) {

            for (int j=0;j<=2; j++) {

                System.out.println("Fila " + i + ", Columna " + j + ": " + a[i][j]);

            }
        }
    }
}
