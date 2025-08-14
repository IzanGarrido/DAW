import java.util.Scanner;
import java.util.HashMap;

public class tresEnRaya {

    public static void pinta(HashMap<Integer,Character> juego, int pos) {
        for (int i = 1; i <= 9; i++) {
            if (juego.get(i-1) != null)System.out.print(juego.get(i-1));
            System.out.print(" | ");
            if (i%3 == 0 ) System.out.println();
        }
    }

    public static int comprueba(HashMap<Integer,Character> juego) {
        int gana = 0;

        if (juego.get(0).equals('X') && juego.get(1).equals('X') && juego.get(2).equals('X') || 
            juego.get(3).equals('X') && juego.get(4).equals('X') && juego.get(5).equals('X') || 
            juego.get(6).equals('X') && juego.get(7).equals('X') && juego.get(8).equals('X') || 
            juego.get(0).equals('X') && juego.get(3).equals('X') && juego.get(6).equals('X') || 
            juego.get(1).equals('X') && juego.get(4).equals('X') && juego.get(7).equals('X') || 
            juego.get(2).equals('X') && juego.get(5).equals('X') && juego.get(8).equals('X') || 
            juego.get(0).equals('X') && juego.get(4).equals('X') && juego.get(8).equals('X') || 
            juego.get(2).equals('X') && juego.get(4).equals('X') && juego.get(6).equals('X')) gana = 1;

        else if (juego.get(0).equals('O') && juego.get(1).equals('O') && juego.get(2).equals('O') || 
                 juego.get(3).equals('O') && juego.get(4).equals('O') && juego.get(5).equals('O') || 
                 juego.get(6).equals('O') && juego.get(7).equals('O') && juego.get(8).equals('O') || 
                 juego.get(0).equals('O') && juego.get(3).equals('O') && juego.get(6).equals('O') || 
                 juego.get(1).equals('O') && juego.get(4).equals('O') && juego.get(7).equals('O') || 
                 juego.get(2).equals('O') && juego.get(5).equals('O') && juego.get(8).equals('O') || 
                 juego.get(0).equals('O') && juego.get(4).equals('O') && juego.get(8).equals('O') || 
                 juego.get(2).equals('O') && juego.get(4).equals('O') && juego.get(6).equals('O')) gana = -1;
        return gana;
    }

    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        HashMap<Integer,Character> juego = new HashMap<Integer, Character>();       
        int yo = 0;
        int pc = 0;
        int gana;
        for (int i = 0; i < 9; i++) juego.put(i, ' ');

        do {
            try {
                
                if (juego.get(yo).equals('X') || juego.get(yo).equals('O')) throw new Exception("Jugada no valida");
                if (juego.get(pc).equals('X') || juego.get(pc).equals('O')) throw new Exception();
                juego.put(yo = sc.nextInt(), 'O'); // YO
                juego.put(pc = (int)(Math.random()*9), 'X'); // MAQUINA
                pinta(juego, yo);
                
                
            } catch (Exception e) {
                e.getMessage();
            }
            gana = comprueba(juego);
        } while(gana != 1 || gana != -1); 
        if (gana == 1) System.out.println("HAS GANADO!");
        else if (gana == -1) System.out.println("HAS PERDIDO!");
    }
    
}