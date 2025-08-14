import java.util.InputMismatchException;
import java.util.Scanner;

public class Ejercicio2 {
    
    public static void pinta(char[][] juego) {
        for (int j = 0; j < 3; j++) {
    
            System.out.println("----------");
            System.out.print("| ");

            for (int k = 0; k < 3; k++) {
               
                System.out.print(juego[j][k]);
                System.out.print(" | ");
            }
            System.out.println();    
        }
    }
    public static void main(String[] args) {
        
        // Variables del programa.
        char[][]  juego = new char[3][3];
        
        int fila = 0;
        int columna = 0;
        char yo = 'X';
        char maquina = '0';
        boolean jugada;
        int i = 9;

        Scanner sc = new Scanner (System.in);

        try {
            while ( i > 0) {

                jugada = false;
    
                // Pintar la tabla.
                pinta(juego);
    
                // Coordenadas introducidas por teclado para el juego
                while (jugada == false) {
    
                    jugada = true;
                    
                    System.out.print("Dame la fila: ");
                    fila = sc.nextInt();
                    System.out.print("Dame la columna: ");
                    columna = sc.nextInt();
    
                    // Esto hace un borrado de pantalla
                    //System.out.print("\033[H\033[2J");
    
                    if (fila == 0 && columna == 0) {
    
                        juego[0][0] = yo;
    
                    } else if (fila == 0 && columna == 1) {
    
                        juego[0][1] = yo;
    
                    } else if (fila == 0 && columna == 2) {
    
                        juego[0][2] = yo;
    
                    } else if (fila == 1 && columna == 0) {
    
                        juego[1][0] = yo;
    
                    } else if (fila == 1 && columna == 1) {
    
                        juego[1][1] = yo;
    
                    } else if (fila == 1 && columna == 2) {
    
                        juego[1][2] = yo;
    
                    } else if (fila == 2 && columna == 0) {
    
                        juego[2][0] = yo;
    
                    } else if (fila == 2 && columna == 1) {
    
                        juego[2][1] = yo;
    
                    } else if (fila == 2 && columna == 2) {
    
                        juego[2][2] = yo;
    
                    }
    
                }
                
                jugada = false;
    
                // Esto introduce las coordenadas random de la maquina.
                while (jugada == false) {
    
                    jugada = true;
    
                    fila = (int) (Math.random()*3);
                    System.out.print("Máquina fila: ");
                    System.out.println(fila);
                    System.out.print("Máquina columna: ");
                    columna = (int) (Math.random()*3);   
                    System.out.println(columna);
    
                    if (fila == 0 && columna == 0) {
    
                        juego[0][0] = maquina;
    
                    } else if (fila == 0 && columna == 1) {
    
                        juego[0][1] = maquina;
    
                    } else if (fila == 0 && columna == 2) {
    
                        juego[0][2] = maquina;
    
                    } else if (fila == 1 && columna == 0) {
    
                        juego[1][0] = maquina;
    
                    } else if (fila == 1 && columna == 1) {
    
                        juego[1][1] = maquina;
    
                    } else if (fila == 1 && columna == 2) {
    
                        juego[1][2] = maquina;
    
                    } else if (fila == 2 && columna == 0) {
    
                        juego[2][0] = maquina;
    
                    } else if (fila == 2 && columna == 1) {
    
                        juego[2][1] = maquina;
    
                    } else if (fila == 2 && columna == 2) {
    
                        juego[2][2] = maquina;
    
                    }
    
    
                }
                
                // Condiciones de victoria.
                if (juego[0][0] == yo && juego[0][1] == yo && juego[0][2] == yo) {
    
                    System.out.println("Has ganado"); i = -1;
    
                } else if (juego[1][0] == yo && juego[1][1] == yo && juego[1][2] == yo) {
    
                    System.out.println("Has ganado"); i = -1;
    
                } else if (juego[2][0] == yo && juego[2][1] == yo && juego[2][2] == yo) {
    
                    System.out.println("Has ganado"); i = -1;
    
                } else if (juego[0][0] == yo && juego[1][0] == yo && juego[2][0] == yo) {
    
                    System.out.println("Has ganado"); i = -1;
    
                } else if (juego[0][1] == yo && juego[1][1] == yo && juego[2][1] == yo) {
    
                    System.out.println("Has ganado"); i = -1;
    
                } else if (juego[0][2] == yo && juego[1][2] == yo && juego[2][2] == yo) {
    
                    System.out.println("Has ganado"); i = -1;
    
                } else if (juego[0][0] == yo && juego[1][1] == yo && juego[2][2] == yo) {
    
                    System.out.println("Has ganado"); i = -1;
    
                }
    
                if (juego[0][0] == maquina && juego[0][1] == maquina && juego[0][2] == maquina) {
    
                    System.out.println("Has perdido"); i = -1;
    
                } else if (juego[1][0] == maquina && juego[1][1] == maquina && juego[1][2] == maquina) {
    
                    System.out.println("Has perdido"); i = -1;
    
                } else if (juego[2][0] == maquina && juego[2][1] == maquina && juego[2][2] == maquina) {
    
                    System.out.println("Has perdido"); i = -1;
    
                } else if (juego[0][0] == maquina && juego[1][0] == maquina && juego[2][0] == maquina) {
    
                    System.out.println("Has perdido"); i = -1;
    
                } else if (juego[0][1] == maquina && juego[1][1] == maquina && juego[2][1] == maquina) {
    
                    System.out.println("Has perdido"); i = -1;
    
                } else if (juego[0][2] == maquina && juego[1][2] == maquina && juego[2][2] == maquina) {
    
                    System.out.println("Has perdido"); i = -1;
    
                } else if (juego[0][0] == maquina && juego[1][1] == maquina && juego[2][2] == maquina) {
    
                    System.out.println("Has perdido"); i = -1;
    
                }
    
                i--;
            
            }

        } catch (InputMismatchException e) {
            System.out.println("No pueden poner un caracter");
        } catch (ArrayIndexOutOfBoundsException e) {
            System.out.println("Te has salido de los limites");
        }
       

        // Pintar la tabla final. 
        pinta(juego);

        if (i == 0) {

            System.out.println("Empate");

        }

        System.out.println("Juego finalizado");
             
    }

}