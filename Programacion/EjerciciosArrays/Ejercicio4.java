public class Ejercicio4 {
    
    public static void main(String[] args) {

        int[][] marco = new int [8][6];

        for (int i = 0; i < 8; i++) {

            marco[i][0] = 1;
            marco [i][5] = 1;

            System.out.print(" ");
           
            for (int j = 0; j < 6; j++) {
                 
                marco[0][j] = 1;
                marco [7][j] = 1;
                System.out.print(marco[i][j]);
                System.out.print("  ");

            }

            System.out.println();

        }

    }

}
