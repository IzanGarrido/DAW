import java.util.Scanner;

public class Ejercicio2 {

    public static void main(String[] args) {

        char[][] juego = { { ' ', ' ', ' ' }, { ' ', ' ', ' ' }, { ' ', ' ', ' ' } };
        int fila;
        int columna;
        int cont = 0;
        boolean sigue = true;

        Scanner sc = new Scanner(System.in);

        do {
            // Yo

            do {

                System.out.print("Dame la fila: ");
                fila = sc.nextInt();
                System.out.print("Dame la columna: ");
                columna = sc.nextInt();

                System.out.print("\033[H\033[2J");

            } while (juego[fila][columna] != ' ');

            juego[fila][columna] = 'X';

            if ((juego[0][0] == 'X' && juego[1][1] == 'X' && juego[2][2] == 'X') ||
                    (juego[0][2] == 'X' && juego[1][1] == 'X' && juego[2][0] == 'X') ||
                    (juego[fila][0] == 'X' && juego[fila][1] == 'X' && juego[fila][2] == 'X') ||
                    (juego[0][columna] == 'X' && juego[1][columna] == 'X' && juego[2][columna] == 'X')) {

                sigue = false;
                System.out.println("Yo gano");

            }

            // PC

            do {

                fila = (int) (Math.random() * 3);
                columna = (int) (Math.random() * 3);

            } while (juego[fila][columna] != ' ');

            juego[fila][columna] = 'O';

            System.out.println("PC fila, columna: " + fila + ", " + columna);

            if ((juego[0][0] == 'O' && juego[1][1] == 'O' && juego[2][2] == 'O') ||
                    (juego[0][2] == 'O' && juego[1][1] == 'O' && juego[2][0] == 'O') ||
                    (juego[fila][0] == 'O' && juego[fila][1] == 'O' && juego[fila][2] == 'O') ||
                    (juego[0][columna] == 'O' && juego[1][columna] == 'O' && juego[2][columna] == 'O')) {

                sigue = false;

                System.out.println("PC Gana");

            }

            for (int i = 0; i < 3; i++) {

                System.out.println("--------------");
                System.out.print("| ");

                for (int j = 0; j < 3; j++) {

                    System.out.print(juego[i][j]);
                    System.out.print(" | ");

                }

                System.out.println();

            }
            System.out.println("--------------\n");

            cont++;
            try {
                Thread.sleep(2000);
            } catch (Exception e) {

            }
        } while (sigue);

        sc.close();

    }

}
