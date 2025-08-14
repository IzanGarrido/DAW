import java.util.Scanner;

public class eventosPartidos {
    
    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);
        int casos = sc.nextInt();
        int n;
        int[] eventos = new int[casos];
        String s;
        String[] evento = new String[casos];
        int consultas;


        for (int i = 0; i < casos; i++) {

            n = sc.nextInt();
            eventos[i] = n;
            s = sc.next();
            evento[i] = s;

        }
        consultas = sc.nextInt();
        for (int i = 0; i < consultas; i++ ) {

            

        }
    }

}
