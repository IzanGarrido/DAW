import java.util.Scanner;

public class Eje2 {
    
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);

        int plantas;
        int habitaciones;
        int[][] estado;
        int casos;
        int hab;
        int planta;
        int numhab;
        String res = "";

        plantas = sc.nextInt();
        habitaciones = sc.nextInt();
        estado = new int[plantas][habitaciones];

        for (int p = 0; p < plantas; p++) {
            for (int h = 0; h < habitaciones; h++) {
                estado[p][h] = sc.nextInt();
            }
        }

        casos = sc.nextInt();

        for (int i = 1; i <= casos; i++) {

            hab = sc.nextInt();

            planta = (int)(hab/100);
            numhab = (hab%100);

            switch (estado[planta-1][numhab-1]) {
                case 0:
                    res = " LIBRE"; break;
                case 1:
                    res = " RESERVADO"; break;
                case 2:
                    res = " OCUPADA"; 
            }
            System.out.println(hab + " " + res);

        }
        sc.close();
    }
}
